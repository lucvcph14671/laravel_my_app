<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProductRequest extends FormRequest
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
            'title' => 'required',
            'status' => 'required',
            'image' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'Không được bỏ trống tên danh mục !',
            'status.required' => 'Chưa chọn trạng thái !',
            'image.required' => 'Không được bỏ trống ảnh !',
        ];
    }
}
