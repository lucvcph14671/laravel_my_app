<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OderRequest extends FormRequest
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
            'email' => 'required',
            'phone'=> 'required',
            'address' => 'required',
            'district' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập tên khách hàng !',
            'email.required' => 'Nhập địa chỉ email !',
            'phone.required' => 'Nhập số điện thoại !',
            'address.required' => 'Nhập địa chỉ !',
            'district.required' => 'Chọn khu vực của bạn !',
        ];
    }
}
