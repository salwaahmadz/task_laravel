<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareFormRequest extends FormRequest
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
            'version' => 'required|String',
            'file' => 'mimetypes:text/plain',
            'email' => 'required|String'
        ];
    }

    public function messages()
    {
        return[
        'version.required'  => 'Please input the Version Number',
        'file.mimetypes'    => 'Files can only have an extension of .txt',
        'email.required'    =. 'Email or Password is was wrong'
    ];
    }
}
