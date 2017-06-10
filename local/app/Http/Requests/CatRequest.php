<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            'cat_name'=>'unique:cats,cat_name'
        ];
    }
    public function messages()
    {
        return [
            'cat_name.unique'=>'Tên danh mục đã tồn tại'
        ];
    }
}
