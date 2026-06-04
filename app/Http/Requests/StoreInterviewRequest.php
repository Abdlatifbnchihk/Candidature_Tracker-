<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'datetime' => 'required|date',
            'result' => 'required|string',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Intercept validated data to rename 'datetime' to 'scheduled_at' for the database.
     */
    public function validated($key = null, $default = null): mixed
    {
        // Call the parent with its expected arguments so it doesn't return null
        $validated = parent::validated($key, $default);

        // If a specific key was requested, just return it directly
        if (is_string($key)) {
            return $validated;
        }

        // Map 'datetime' field from form to 'scheduled_at' column in DB
        if (is_array($validated) && isset($validated['datetime'])) {
            $validated['scheduled_at'] = $validated['datetime'];
            unset($validated['datetime']);
        }

        return $validated;
    }


}
