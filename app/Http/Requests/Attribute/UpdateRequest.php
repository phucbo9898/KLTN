<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thuộc tính bắt buộc',
            'type.required' => 'Kiểu dữ liệu là bắt buộc'
        ];
    }
}
