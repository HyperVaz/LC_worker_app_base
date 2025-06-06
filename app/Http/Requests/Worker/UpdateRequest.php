<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=> 'required|string',
            'surname'=> 'required|string',
            'email'=> 'required|email',
            'age'=> 'nullable|integer',
            'description'=> 'nullable|string',
            'is_married'=> 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле с именем является обязательным',
            'name.string' => 'Поле с именем является строкой',
            'surname.required' => 'Поле с фамилией является обязательным',
            'age.required' => 'Поле с возрастом является обязательным',
            'age.integer' => 'Поле с возрастом является числом',
            'email.email' => 'Это поле должно быть почтой'
        ];
    }
}
