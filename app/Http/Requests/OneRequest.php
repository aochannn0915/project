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
            'mail_adress' => 'required | max:255',
            'password'    => 'required | max:255',
            'user_name'   =>'required | max:255',
            'product_name'=>'required | max:255',
            'company_name'=>'required | max:255',
            'price'=>'required | max:255',
            'stock'=>'required | max:255',
            'comment' => 'max:10000',
        ];
    }
    public function attributes()
    {
        return [
            'mail_adress' => 'メールアドレス',
            'password'    => 'パスワード',
            'user_name'   =>'ユーザーネーム',
            'product_name'=>'商品名',
            'company_name'=>'メーカー名',
            'price'=>'値段',
            'stock'=>'在庫',
            'comment' => 'コメント',
        ];
    }
    public function messages(){
        return [
            'mail_adress.required' => ':attributeは入力は必須です。',
            'mail_adress.max'      => ':attributeは:max字以内で入力してください。',
            'password.required'    => ':attributeは入力は必須です。',
            'password.max'         => ':attributeは:max字以内で入力してください。',
            'user_name'            => ':attributeは入力は必須です。',
            'user_name.max'        => ':attributeは:max字以内で入力してください。',
            'product_name'         => ':attributeは入力は必須です。',
            'product_name.max'     => ':attributeは:max字以内で入力してください。',
            'company_name'         => ':attributeは入力は必須です。',
            'company_name.max'     => ':attributeは:max字以内で入力してください。',
            'price'                => ':attributeは入力は必須です。',
            'price.max'            => ':attributeは:max字以内で入力してください。',
            'stock'                => ':attributeは入力は必須です。',
            'stock.max'            => ':attributeは:max字以内で入力してください。',
            'comment'              => ':attributeは入力は必須です。',
            'comment.max'          => ':attributeは:max字以内で入力してください。',
        ];
    }
}
