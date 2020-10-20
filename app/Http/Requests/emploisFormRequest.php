<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class emploisFormRequest extends FormRequest
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
            'titre' => 'required|string|min:1',
            'description' => 'required|string|min:5',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000' ,
            'email_post' => 'sometimes|email|string',
            'type_contrat' => 'required|string',
            'localisation' => 'required|string',
            'society' => 'required|string',
            'documents' => 'required|string',
            'type_offre' => 'required|string',
            // 'date_debut' => 'required|date|after:now',
            'date_fin' => 'required|date|after:now'

        ];
    }
}
