<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fichierFormRequest extends FormRequest
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
            'prod_id' => 'integer',
            'nom' => 'required|mimes:jpeg,jpg,png,gif,docx,doc,pdf,txt,mp4,avi,ogg,mpeg,3gp|max:10000000',
            'title' => 'required|string'
        ];
    }
}
