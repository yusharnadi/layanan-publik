<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicatorPostRequest extends FormRequest
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
            'indicator_code' => 'required',
            'indicator_name' => 'required',
            'indicator_description' => 'required',
            'aspect_id' => 'required',
            'doc_1' => 'required',
            'doc_2' => '',
            'doc_3' => '',
            'doc_4' => '',
            'doc_5' => '',
            'skala_0' => 'required',
            'skala_1' => 'required',
            'skala_2' => 'required',
            'skala_3' => 'required',
            'skala_4' => 'required',
            'skala_5' => 'required',
            'indicator_bobot' => 'required',
        ];
    }
}
