<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [

            'password' => 'required|min:6|confirmed',
        ];

    }

    public function messages()
    {
        return [
            'password.required' => 'Điền mật khẩu !',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự !',
            'password.confirmed' => 'Mật khẩu khoong khớp !',
        ];
    }
}
