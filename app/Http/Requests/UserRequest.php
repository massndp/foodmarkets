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
}
