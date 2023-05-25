<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:attributes,name|max:40',
            'type' => 'required',
            'value' => 'required_if:type,select|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thuộc tính bắt buộc',
            'name.unique' => 'Tên thuộc tính đã tồn tại',
            'type.required' => 'Kiểu dữ liệu là bắt buộc',
            'value.required_if' => 'Giá trị là bắt buộc khi loại thuộc tính là lựa chọn',
            'name.max' => 'Tên thuộc tính có độ dài tối đa 40 kí tự',
            'value.max' => 'Giá trị thuộc tính có độ dài tối đa 255 kí tự',
        ];
    }
}
