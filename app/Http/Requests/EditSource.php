<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSource extends FormRequest
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
            'name' => 'required|max:100',
            'url' => 'required|max:255|url|unique:App\Models\Source,url,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'url.unique' => 'This url already exists',
            'url.url' => 'It\'s must be url',
        ];
    }
}
