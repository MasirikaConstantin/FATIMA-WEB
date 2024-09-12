<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GallerieValidator extends FormRequest
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
            'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/', 'unique:galleries,slug'],
            'image' => [
                'nullable',
                'image',            
                'mimes:jpeg,png,bmp,gif,svg,webp,PNG,JPEG,jpg,JPG',
                'max:15048',   
                'dimensions:min_width=100,min_height=200,max_width=5000,max_height=8000',
            ],
            'user_id' => ['required', 'exists:users,id'],
            'lien'=>['nullable',"url"]
        ];
    }

    protected function prepareForValidation()
    {
        
    $this->merge([
        'slug' => $this->input('slug') ?: Str::slug($this->input('titre') . '-' . Carbon::now()->format('Y-m-d-H-i-s'))
    ]);
}

}
