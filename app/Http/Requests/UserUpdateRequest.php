<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        if (parent::input('password') != '') {
            return [
                'name' => 'required',
                'nip' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
                'department_id' => 'required',
                'role' => 'required'
            ];
        } else {
            return [
                'name' => 'required',
                'nip' => 'required',
                'email' => 'required|email',
                'department_id' => 'required',
                'role' => 'required'
            ];
        }
    }
}
