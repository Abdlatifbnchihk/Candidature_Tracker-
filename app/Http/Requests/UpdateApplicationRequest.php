<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // authorization handled via Policy in controller
    }

    public function rules(): array
    {
        return [
            'company'    => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'url'        => ['nullable', 'url', 'max:500'],
            'status'     => ['required', 'in:applied,phone_screen,interview,technical_test,offer,rejected,accepted'],
            'priority'   => ['required', 'in:low,medium,high'],
            'notes'      => ['nullable', 'string'],
            'applied_at' => ['required', 'date'],
            'file'       => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return (new StoreApplicationRequest())->messages();
    }
}