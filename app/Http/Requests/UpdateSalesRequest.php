<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesRequest extends FormRequest
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
            'nis' => 'nullable',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',Rule::unique('users', 'username')->ignore($this->id),
            'email' => 'required|string|email',Rule::unique('users', 'email')->ignore($this->id),
            'tanggal_lahir' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'nullable',
        ]; 
    }
}
