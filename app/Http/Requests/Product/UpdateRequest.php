<?php

namespace App\Http\Requests\Product;

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
            'name' => ['required', 'min:3', 'max:255', Rule::unique('products')->ignore($this->id)],
            'content' => 'required|min:3',
            'category_id' => 'required',
            'price' => 'required|integer|gte:0',
            'sale' => 'required|integer|gte:0|lte:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập trường tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.min' => 'Tên sản phẩm ít nhất 3 kí tự',
            'name.max' => 'Tên sản phẩm nhiều nhất nhất 255 kí tự',
            'content.required' => 'Bạn cần nhập trường nội dung sản phẩm',
            'content.min' => 'Nội dung sản phẩm ít nhất 3 kí tự',
            'category_id.required' => 'Bạn cần chọn loại sản phẩm',
            'price.required' => 'Bạn cần nhập trường giá sản phẩm',
            'price.integer' => 'Giá sản phẩm là kiểu số',
            'price.gte' => 'Giá sản phẩm phải là 1 số nguyên dương !',
            'sale.integer' => 'Giảm giá sản phẩm là kiểu số nguyên dương',
            'sale.required' => 'Bạn cần nhập trường giảm giá sản phẩm, Nếu k muốn giảm giá hãy nhập giá trị bằng 0 xin cảm ơn !!',
            'sale.gte' => 'Giảm giá sản phẩm phải lớn hơn hoặc bằng 0 !',
            'sale.lte' => 'Giảm giá sản phẩm phải nhỏ hơn hoặc bằng 100 !',
        ];
    }
}
