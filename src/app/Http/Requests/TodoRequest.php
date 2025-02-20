<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content'=>['required','string','max:20'],
            'category_id'=>['required','exists:categories,id']
        ];
    }
    public function messages(){
        return[
            'content.required'=>'内容を入力してください',
            'content.string'=>'文字列で入力してください',
            'content.max'=>'20文字以内で入力してください',

             'category_id.required' => 'カテゴリーを選択してください',
            'category_id.exists' => '無効なカテゴリーです'
        ];
    }

}
