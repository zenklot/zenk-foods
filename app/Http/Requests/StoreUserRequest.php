<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nama_user' => 'required|max:128',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'no_hp' => 'required|digits_between:10,13',
            'kota' => 'required|string'
        ];
    }
}
