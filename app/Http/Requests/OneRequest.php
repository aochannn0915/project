<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'mail_adress.required' => 'メールアドレスは入力は必須です。',
            'password.required'    => 'パスワードは入力は必須です。',
            'user_name'            => 'ユーザーネームは入力は必須です。',
            'product_name'         => '商品名は入力は必須です。',
            'company_name'         => '会社名は入力は必須です。',
            'price'                => '値段は入力は必須です。',
            'stock'                => '在庫は入力は必須です。',
        ];
    }
}
