<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LectureRequest extends FormRequest
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
            'titre_1'=>['required', 'min:10'],
            'titre_2'=>['required', 'min:10'],
            'titre_3'=>['required', 'min:10'],
            'description_1'=>['required', 'min:20'],
            'description_2'=>['required', 'min:20'],
            'description_3'=>['required', 'min:20'],
            'meditation'=>['required', 'min:20'],
            'date'=>['required', 'date'],
            'slug' => ['required', 'min:8', 'regex:/^[0-9a-z\-]+$/'],
            'user_id' => ['required', 'exists:users,id'],


        ];
    }

    protected function prepareForValidation()
    {
        // Générer le slug si non fourni
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre_1'))
        ]);
    }
}
