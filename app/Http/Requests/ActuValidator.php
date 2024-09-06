<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ActuValidator extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   

    public function rules(): array
    {
        return [
            'titre' => ['required', 'min:4'],
            'description' => ['required', 'string'],
            'image' => [
                'nullable',
                'image',            
                'mimes:jpeg,png,bmp,gif,svg,webp,PNG',
                'max:5048',   
                'dimensions:min_width=100,min_height=200,max_width=2000,max_height=4000',
            ],
            'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/', 'unique:actus,slug'],
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
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre'))
        ]);

        
    }
}
