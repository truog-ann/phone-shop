<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RePassRequest extends FormRequest
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
            'old_pass' => "required|min:8",
            'new_pass' => "required|min:8"
        ];
    }
    public function messages()
    {
        return [
            'old_pass.required' => 'Mật khẩu cũ không được bỏ trống',
            'old_pass.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'new_pass.required' => 'Mật khẩu mới không được bỏ trống và ít nhất 8 ký tự',
        ];
    }
}
