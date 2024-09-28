<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'address' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name' => 'Tên không được để trống và ít nhất 3 ký tự',
            'email' => 'Email không được để trống và đúng định dạn a@email.com',
            'phone' => 'Số diện thoại không được để trống và đủ 10 số với số 0 ở đầu',
            'address' => 'Địa chỉ không được để trống',
        ];
    }
}
