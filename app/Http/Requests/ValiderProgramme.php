<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
                'nullable',
                'image',            
                'mimes:jpeg,png,bmp,gif,svg,webp,PNG',
                'max:5048',   
                'dimensions:min_width=100,min_height=200,max_width=2000,max_height=4000', 
            ],
            'slug'=>['required', 'min:8' ,'regex:/^[0-9a-z\-]+$/', 'unique:programmes,slug'],

            'user_id'=>['required', 'exists:users,id'],


        ];
    }

    protected function prepareForValidation(){
        /*$this->merge([
            'slug'=>$this->input('slug')?: Str::slug($this->input('titre'))
    
            ]);*/

            $this->merge([
                'slug' => $this->input('slug') ?: Str::slug($this->input('titre') . '-' . Carbon::now()->format('Y-m-d-H-i-s'))
            ]);

        // Formater le champ h_debut pour enlever les secondes
        if ($this->has('h_debut')) {
            $this->merge([
                'h_debut' => date('H:i', strtotime($this->input('h_debut')))
            ]);
        }

        // Formater le champ h_fin de la même manière si nécessaire
        if ($this->has('h_fin')) {
            $this->merge([
                'h_fin' => date('H:i', strtotime($this->input('h_fin')))
            ]);
        }
    }
}
