<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inscriptionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'pwd' => 'required|string|confirmed|min:6|',
            'fonction' => 'required|string|min:3',
            'role' => 'sometimes|nullable|numeric',
        ];
    }
}
