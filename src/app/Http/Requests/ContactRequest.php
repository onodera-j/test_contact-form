<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "last_name" => ["required", "string"],
            "first_name" => ["required", "string"],
            "gender" => ["required"],
            "email" => ["required", "email"],
            "tel-1" => ["required", "string", "max:5"],
            "tel-2" => ["required", "string", "max:5"],
            "tel-3" => ["required", "string", "max:5"],
            "address" => ["required", "string"],
            "category_id" => ["required"],
            "detail" => ["required", "string", "max:120"],
            //
        ];
    }

    public function messages()
    {
        return [
            "last_name.required" => "姓を入力してください",
            "first_name.required" => "名を入力してください",
            "gender.required" => "性別を選択してください",
            "email.required" => "メールアドレスを入力してください",
            "email.email" => "メールアドレスはメール形式で入力してください",
            "tel-1.required" => "電話番号を入力してください",
            "tel-1.max" => "電話番号は5桁までの数字を入力してください",
            "tel-2.required" => "電話番号を入力してください",
            "tel-2.max" => "電話番号は5桁までの数字を入力してください",
            "tel-3.required" => "電話番号を入力してください",
            "tel-3.max" => "電話番号は5桁までの数字を入力してください",
            "address.required" => "住所を入力してください",
            "catedory_id.required" => "お問い合わせの種類を選択してください",
            "detail.required" => "お問い合わせ内容を入力してください",
            "detail.max" => "お問い合わせ内容は120文字以内で入力してください",
        ];


    }
}
