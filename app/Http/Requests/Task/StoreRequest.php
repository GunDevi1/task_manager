<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:500',
            'priority' => 'required|integer|in:1,2,3,4',
            'user_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.max' => 'Ваше название слишком длинное',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'content.max' => 'Ваше описание слишком длинное',
        ];
    }
}
