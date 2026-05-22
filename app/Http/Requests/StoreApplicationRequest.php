<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
        return [
            'company.required'    => "Le nom de l'entreprise est obligatoire.",
            'position.required'   => 'Le poste est obligatoire.',
            'url.url'             => "L'URL doit être une adresse valide.",
            'status.required'     => 'Le statut est obligatoire.',
            'status.in'           => 'Le statut sélectionné est invalide.',
            'priority.required'   => 'La priorité est obligatoire.',
            'priority.in'         => 'La priorité sélectionnée est invalide.',
            'applied_at.required' => 'La date de candidature est obligatoire.',
            'applied_at.date'     => 'La date de candidature doit être une date valide.',
            'file.mimes'          => 'Le fichier doit être de type PDF, Word ou image.',
            'file.max'            => 'Le fichier ne doit pas dépasser 5 Mo.',
        ];
    }
}