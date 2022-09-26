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
            'indicator_visibility' => 'required',
            'aspect_id' => 'required',
        ];
    }
}
