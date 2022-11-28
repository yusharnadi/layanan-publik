<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenilaianStoreRequest extends FormRequest
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
            'tahun' => 'required',
            'semester' => 'required',
            'nilai' => 'required',
            'status' => '',
            'keterangan' => '',
        ];
    }
}
