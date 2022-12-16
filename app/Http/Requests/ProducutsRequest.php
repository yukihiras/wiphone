<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducutsRequest extends FormRequest
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
                            "name" => "required",
                            "price" => "required",
                            "image" => "required",
                            "description" => "required",
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
            'name.required' => "bắt buộc phải nhập tên sản phẩm",
            'price.required' => 'bắt buộc phải nhập giá sản phẩm',
            'image.required' => "bắt buộc có ảnh sản phẩm",
            'description.required' => "bắt buộc phải nhập mô tả sản phẩm",
        ];
    }
}
