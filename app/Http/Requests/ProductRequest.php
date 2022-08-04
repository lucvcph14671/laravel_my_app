<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'quantity' => 'required',
            'price' => 'required',
            'status' => 'required',
            'id_category_products' => 'required',
            'id_color' => 'required',
            'id_size' => 'required',
            'desc' => 'required',
            'thumbnail' => 'required',
            // 'images[]' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống tên sản phẩm !',
            'quantity.required' => 'Chưa điền số lượng !',
            'price.required' => 'Nhập số tiền !',
            'id_color.required' => 'Chọn màu !',
            'id_size.required' => 'Chọn size !',
            'status.required' => 'Chưa chọn trạng thái !',
            'id_category_products.required' => 'Chưa chọn damh mục !',
            'desc.required' => 'Điền mô tả !',
            'thumbnail.required' => 'Chọn ảnh đại diện !',
            // 'images[].required' => 'Ảnh chi tiết !',
        ];
    }
}
