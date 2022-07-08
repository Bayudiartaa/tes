<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SalesRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->isMethod('PUT'))
        {
            return [
                'nis' => 'nullable',
                // 'nama' => 'required|string|max:255',
                // 'username' => 'required|string|max:255|unique:users'.$this->user->id,
                // 'email' => 'required|string|email|unique:users'.$this->user->id,
                // 'tanggal_lahir' => 'required',
                // 'umur' => 'required|numeric',
                // 'alamat' => 'required',
                'password' => 'nullable',
            ]; 
        } else {
            return [
                'nis' => 'nullable',
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|unique:users',
                'tanggal_lahir' =>'required',
                'umur' => 'required|numeric',
                'alamat' =>'required',
                'password' => 'nullable',
            ]; 

        }
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['error' => $validator->errors()->all()]);
        throw new ValidationException($validator, $response);
    }
}
