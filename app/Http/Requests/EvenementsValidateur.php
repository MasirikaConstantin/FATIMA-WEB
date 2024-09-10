<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EvenementsValidateur extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Autorise l'accès à tous les utilisateurs authentifiés
    }

    /**
     * Les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['required', 'min:4'],
            'description' => ['required', 'string'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
            'h_debut' => ['required', 'date_format:H:i'],
            'h_fin' => ['required', 'date_format:H:i', 'after:h_debut'],
            'image' => [
                'nullable',
                'image',            
                'mimes:jpeg,png,bmp,gif,svg,webp,PNG',
                'max:5048',   
                'dimensions:min_width=100,min_height=200,max_width=2000,max_height=4000',
            ],
            'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/', 'unique:evenements,slug'],

            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    /**
     * Prépare les données pour la validation.
     */
    protected function prepareForValidation()
    {
        // Générer le slug si non fourni
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre') . '-' . Carbon::now()->format('Y-m-d-H-i-s'))
        ]);

        // Formater le champ h_debut pour enlever les secondes
        if ($this->has('h_debut')) {
            $this->merge([
                'h_debut' => date('H:i', strtotime($this->input('h_debut')))
            ]);
        }

        // Formater le champ h_fin de la même manière
        if ($this->has('h_fin')) {
            $this->merge([
                'h_fin' => date('H:i', strtotime($this->input('h_fin')))
            ]);
        }
    }
}
