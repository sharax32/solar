<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreComment extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'title.name' => 'Необходимо указать заголовок',
            'body.text'  => 'Необходимо написать коммент',
        ];
    }
}
