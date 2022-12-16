<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //cấp quyền truy cập khi sử dụng formRequest
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *s
     * @return array<string, mixed>
     */
    public function rules()
    {
        // đây là nơi viết validate
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            "email" => "required",
                            "username" => "required",
                            "password" => "required",
                            "phoneNumber" => "required",
                        ];
                        break;
                        
                    default:
                        break;
                }
                break;
        endswitch;
        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => "bắt buộc phải nhập tên đăng nhập",
            'email.required' => 'bắt buộc phải nhập email',
            'password.required' => "bắt buộc phải nhập mật khẩu",
            'phoneNumber.required' => "bắt buộc phải nhập số điện thoại",
        ];
    }
}
