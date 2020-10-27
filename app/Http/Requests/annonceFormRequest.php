<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class annonceFormRequest extends FormRequest
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
            'titre' => 'required|min:1',
            'contenu' => 'required|string|min:5',
            'source' => 'sometimes|string|nullable|min:5',
            'editeur' => 'sometimes|string|nullable|min:5',
            'fichier' => 'required|mimes:jpeg,jpg,png,gif,docx,doc,pdf,txt,mp4,avi,ogg,mpeg,3gp|max:10000000'
            //'typ_fichier' => 'required|string|min:5'
        ];
    }
}
