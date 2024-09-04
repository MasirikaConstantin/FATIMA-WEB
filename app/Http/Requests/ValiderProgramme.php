<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ValiderProgramme extends FormRequest
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
            'date' => ['required', 'date'],
            'h_debut' => ['required', 'date_format:H:i'],
            'h_fin' => ['required', 'date_format:H:i'],
            'description' => ['required', 'string'],
            'image' => [
                'image',            // Doit être un fichier image (jpeg, png, bmp, gif, svg, webp)
                'mimes:jpeg,png,bmp,gif,svg,webp,PNG', // Types de fichiers autorisés
                'max:5048',         // Taille maximale en kilo-octets (ici, 2 Mo)
                'dimensions:min_width=100,min_height=200,max_width=2000,max_height=4000', // Dimensions minimales et maximales
            ],
            'slug'=>['required', 'min:8' ,'regex:/^[0-9a-z\-]+$/', 'unique:programmes,slug'],
            'user_id'=>['required', 'exists:users,id'],


        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'slug'=>$this->input('slug')?: Str::slug($this->input('titre'))
    
            ]);
    }
}
