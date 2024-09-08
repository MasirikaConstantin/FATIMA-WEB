<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BlogValidator extends FormRequest
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
            'titre' => ['required', 'min:5'],
            'message'=> ['required', 'min:20'],
            'user_id'=> ['required', 'exists:users,id'],
            'slug' => ['required', 'min:19', 'regex:/^[0-9a-z\-]+$/', 'unique:blogs,slug'],

            'categorie_id'=>['required'],
            'etat'=>['nullable']



        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug(Auth::user()->name . '-' . Carbon::now()->format('Y-m-d-H-i-s'))
        ]);
    }

}