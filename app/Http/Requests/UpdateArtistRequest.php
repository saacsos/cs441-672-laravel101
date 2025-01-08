<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArtistRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('artists', 'name')->ignore($this->artist)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Artist name is required.',
            'name.min' => 'ชื่อศิลปินต้องมีอย่างน้อย 3 ตัวอักษร',
            'name.max' => 'ชื่อศิลปินยาวเกินไปนะ จำกัดที่ 255 ตัว',
            'name.unique' => 'ชื่อศิลปินนี้มีอยู่ในระบบแล้ว'
        ];
    }
}
