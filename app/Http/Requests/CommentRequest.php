<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'email' => 'required|email',
            'content' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập họ tên !',
            'email.required' => 'Chưa nhập email !',
            'email.email' => 'Email sai định dạng!',
            'content.required' => 'Không được bỏ trống đánh giá !',
        ];
    }
}
