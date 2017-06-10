<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'unique:users,name|max:25|min:6',
            'password'=>'max:10|min:3',
            're-password'=>'same:password',
            'email'=>'email|unique:users,email'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên thành viên đã tồn tại',
            'name.max'=>'Tên thành viên phải có độ dài từ 6 đến 25 ký tự',
            'name.min'=>'Tên thành viên phải có độ dài từ 6 đến 25 ký tự',
            'password.max'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
            'password.min'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
            're-password.same'=>'Mật khẩu phải trùng khớp',
            'email.email'=>'Email không hợp lệ',
            'email.unique'=>'Email đã tồn tại'
        ];
    }
}
