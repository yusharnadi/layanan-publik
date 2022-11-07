<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanStoreRequest extends FormRequest
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
            'indicator_id' => 'required',
            'department_id' => 'required',
            'file_1' => 'required|mimes:pdf|max:5120',
            'file_2' => 'mimes:pdf|max:5120',
            'file_3' => 'mimes:pdf|max:5120',
            'file_4' => 'mimes:pdf|max:5120',
        ];
    }
}
