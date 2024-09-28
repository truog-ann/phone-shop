<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            //
            'name_cate' => ['required', 'min:3'],
        ];
    }
    public function messages()
    {
        return [
            'name_cate' => 'Tên danh mục không được để trống và dài hơn 3 ký tự',
        ];
    }
}
