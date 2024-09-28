<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title_banner' => ['required', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'title_banner' => "Tiêu đề không được bỏ trống và tối đa 255 ký tự",
        ];
    }
}
