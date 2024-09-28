<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_product' => ['required', 'min:3'],
            'quantity' => ['alpha_num', 'min:0'],
            'price' => ['required', 'alpha_num', 'min:1'],
            'price_promotion' => ['required', 'alpha_num', 'min:1','before_or_equal:price'],
            'cate_id' => ['required'],
            'promotion_id' => ['required'],
            'desc' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'name_product' => "Tên sản phẩm không được để trống và tối thiểu 3 ký tự",
            'quantity' => 'Số lượng phải là sô',
            'price' => 'Giá bán không được để trống và là chữ số',
            'price_promotion' => 'Giá khuyến mại không được để trống và phải nhỏ hơn giá bán',
            'cate_id' => 'Danh mục không được để trống',
            'promotion_id' => 'Khuyến mại không được để trống',
        ];
    }
}
