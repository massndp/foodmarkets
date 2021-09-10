<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;

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
            'name' => 'required', 
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'roles' => 'required|in:USER,ADMIN',
            'house_number' => 'required',
            'phone_number' => 'required', 
            'city' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi', 
            'address.required' => 'Alamat wajib diisi',
            'house_number.required' => 'No rumah wajib diisi',
            'phone_number.required' => 'No ponsel wajib diisi',
            'city.required.required' => 'Kota wajib diisi',
            'roles.required' => 'Roles wajib diisi', 
        ];

    }
}
