<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    /**
     * リクエストを実行するユーザーが許可されているか判定します。
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストに適用されるバリデーションルールを取得します。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    /**
     * バリデータエラーメッセージに表示するカスタム属性名を取得します。
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    /**
     * バリデーションルールに対するエラーメッセージを取得します。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }

}
