<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'name' => 'required',
            'picturePath' => 'required|image',
            'description' => 'required',
            'ingredients' => 'required',
            'price' => 'required|integer',
            'rate' => 'required|integer',
            'type' => ''
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Nama wajib diisi',
            'picturePath.required' => 'Gambar wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'ingredients.required' => 'Bahan wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.integer' => 'Harga wajib angka',
            'rate.required' => 'Rate wajib diisi',
            'rate.integer' => 'Rate wajib angka',
            
        ];
        
    }
}
 