<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|min:6|max:32',
            'phone' => 'required',
            'address' => 'required',

        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập họ tên !',
            'email.required' => 'Không được bỏ trống email !',
            'email.email' => 'Không đúng định dạng email !',
            'email.min' => 'Email tối thiểu 6 kí tự !',
            'email.max' => 'Email tối đa 32 kí tự !',
            'phone.required' => 'Số điện thoại không bỏ trống !',
            'address.required' => 'Nhập dịa chỉ !',
        ];
    }
}
