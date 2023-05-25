<?php

namespace App\Http\Requests\Article;

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
            'name' => 'required|unique:articles,name|min:3|max:255',
            'image' => 'required',
            'description' => 'required|min:3',
            'content' => 'required|min:3'
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
            'name.required' => 'Bạn cần nhập trường tên bài viết',
            'name.unique' => 'Tên bài viết đã tồn tại',
            'name.min' => 'Tên bài viết tối thiểu 3 kí tự',
            'name.max' => 'Tên bài viết tối đa 255 kí tự',
            'description.required' => 'Mô tả bài viết còn trống',
            'description.min' => 'Mô tả bài viết cần ít nhất 3 kí tự',
            'content.required' => 'Nội dung bài viết còn trống',
            'content.min' => 'Nội dung bài viết cần ít nhất 3 kí tự',
            'image.required' => 'Bạn cần nhập trường ảnh bài viết'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
