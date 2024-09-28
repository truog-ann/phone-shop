<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'name_user' => ['required'],
            'email' => ['required','email', 'unique:users,email'],
            'pass_original' => ['required', 'min:8'],
            'phone' => ['nullable', 'numeric'],
            'role_id' => ['required'],
            'address' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'name_user' => "Vui lòng nhập tên.",
            'email.required' => "Vui lòng nhập email.",
            'email.unique' => "Email đã tồn tại.",
            'email.email' => "Email không đúng định dạng.",
            'pass_original'=>"Vui lòng nhập mật khẩu với tối thiểu 8 ký tự.",
            'role_id'=>"Vui lòng chọn vai trò.",
        ];
    }
}
