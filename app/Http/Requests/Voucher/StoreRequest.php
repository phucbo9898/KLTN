<?php

namespace App\Http\Requests\Voucher;

use Carbon\Carbon;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => ['required', 'max:255', 'unique:coupons,code'],
            'sale' => 'required|numeric|min:1|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'Mã giảm giá không được trống',
            'code.max' => 'Mã giảm giá nhiều nhất 255 kí tự',
            'code.unique' => 'Mã giảm giá đã tồn tại',
            'sale.required' => 'Giá trị giảm giá đang để trống!, vui lòng nhập giá trị !!!',
            'sale.numeric' => 'Định dạng giá trị không đúng !',
            'sale.min' => 'Giá trị giảm giá tối thiểu = 1 !',
            'sale.max' => 'Giá trị giảm giá tối đa = 100 !',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
