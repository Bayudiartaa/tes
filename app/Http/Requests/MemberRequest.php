<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'username' =>  'required|string|max:255|unique:members',
            'email' => 'required|string|max:255|unique:members|email',
            'no_telepon' => 'required|numeric|min:11',
            'user_id' => 'required',
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(Response::status('failed')->message('Terjadi Kesalahan Input')->result($validator->errors()));
    // }
}
