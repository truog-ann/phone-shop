<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name_user' => ['required', 'min:3'],
            'email' => ['required', 'unique:users', 'email'],
            'pass_original' => ['required', 'min:8'],
            'phone' => ['nullable', 'numeric', 'digits:10'],
            'address' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'name_user' => "Vui lòng nhập tên, tối thiểu 3 ký tự",
            'email.required' => "Vui lòng nhập email",
            'email.unique' => "Email đã tồn tại",
            'email.email' => "Email không đúng định dạng. Ví dụ: abc@email.com",
            'pass_original' => "Mật khẩu phải có ít nhất 8 ký tự",
            'phone' => 'Không đủ ký tự',
        ];
    }
}
