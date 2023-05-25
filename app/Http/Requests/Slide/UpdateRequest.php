<?php

namespace App\Http\Requests\Slide;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('slides')->ignore($this->id)],
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
            'name.required' => __('Please enter slide name'),
            'name.unique' => __('Tên slide đã tồn tại'),
            'name.max' => __('Tên slide tối đa là 255 kí tự'),
            'image.required' => __('Please choose slide photo'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('Name'),
            'image' => __('Image'),
        ];
    }
}
