<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'phone' => ['nullable', 'numeric', 'digits:10'],
            'address' => ['nullable']
        ];
    }
    public function messages()
    {
        return [
            'name_user' => "Vui lòng nhập tên và không ít hơn 3 ký tự",
            'phone.numeric' => "Số điện thoại phải là số và có 10 chữ số",
        ];
    }
}
