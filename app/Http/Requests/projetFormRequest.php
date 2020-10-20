<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projetFormRequest extends FormRequest
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
            'libelle'=>'required|string|min:1',
            'description'=>'required|string|min:5',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:20480'
        ];
    }
}
