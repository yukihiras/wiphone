<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
        // đây là nơi viết validate
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            "customerName" => "required",
                            "address" => "required",
                            "phoneNumber" => "required",
                            "email" => "required|email",
                            "description" => "required",
                            "totalPrice" => "required",
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
            'customerName.required' => "bắt buộc phải nhập tên khách hàng",
            'address.required' => "bắt buộc phải nhập địa chỉ",
            'email.required' => "bắt buộc phải nhập email",
            'email.email' => "bắt buộc phải nhập đúng định dạng mail",
            'totalPrice.required' => 'bắt buộc phải nhập tổng tiền',
            'description.required' => "bắt buộc nhập mô tả",
        ];
    }
}
