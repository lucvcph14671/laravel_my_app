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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [

            'passwordold' => 'required|min:6|',
            'password' => 'required|min:6|confirmed',
        ];

    }

    public function messages()
    {
        return [
            'passwordold.required' => 'Điền mật khẩu cũ !',
            'passwordold.min' => 'Mật khẩu cũ tối thiểu 6 kí tự !',
            'password.required' => 'Điền mật khẩu !',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự !',
            'password.confirmed' => 'Mật khẩu không khớp !',
        ];
    }
}
