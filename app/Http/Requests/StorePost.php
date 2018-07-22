<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

class StorePost extends FormRequest
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
            'title' => 'required|unique:posts',
            'summary' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Поле не должно быть пустым.',
            'title.unique' => 'Пост с таким заголовком уже существует.'
        ];
    }
}
