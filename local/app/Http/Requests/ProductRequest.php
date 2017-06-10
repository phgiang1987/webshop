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
     * @return array
     */
    public function rules()
    {
        return [
            'pro_name'=>'unique:products,pro_name',
            'pro_img'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'pro_name.unique'=>'Tên sản phẩm đã tồn tại',
            'pro_img.image'=>'Ảnh sản phẩm không đúng định dạng'
        ];
    }
}
