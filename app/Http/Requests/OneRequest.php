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
            'mail_adress.required' => '入力は必須です。',
            'password.required' => '入力は必須です。',
            'user_name'=>'入力は必須です。',
            'product_name'=>'入力は必須です。',
            'company_name'=>'入力は必須です。',
            'price'=>'入力は必須です。',
            'stock'=>'入力は必須です。',
        ];
    }
}
