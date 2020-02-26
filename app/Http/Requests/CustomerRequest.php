<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'email' => 'required|email|max:150',
            'postal_address' => 'required|max:10',
            'physical_address' => 'required|max:255',
            'username'=>'required|unique:customers|max:100',
            'password'         => 'required|max:255',
            'confirm_password' => 'required|same:password|max:255'
        ];
    }
    public function messages()
    {
        return [
            
        ];
    }
}
