<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'title_promotion' => ['required'],
            'start' => ['required', 'after:' . now()],
            'end' => ['required', 'after:start'],
        ];
    }
    public function messages()
    {
        return [
            'title_promotion' => "Tiêu đề khuyến mại không được để trống",
            'start.required' => "Chưa chọn ngày bắt đầu khuyến mại",
            'start.after_or_equal' => "Ngày bắt đầu phải lớn hơn hôm nay",
            'end.required' => "Chưa chọn ngày kết thúc khuyến mại",
            'end.after' => "Ngày kết thúc phải lớn hơn ngày bắt đầu",
        ];
    }
}
