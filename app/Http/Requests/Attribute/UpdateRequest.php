<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['required', Rule::unique('attributes')->ignore($this->id)],
            'type' => 'required',
            'value' => 'required_if:type,select'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thuộc tính bắt buộc',
            'name.unique' => 'Thuộc tính đã tồn tại',
            'type.required' => 'Kiểu dữ liệu là bắt buộc',
            'value.required_if' => 'Giá trị là bắt buộc khi kiểu thuộc tính là select'
        ];
    }
}
