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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50|email',
            'username' => 'required|min:3|max:50',
            'mobile' => 'required|min:3|max:50',
            'password' => 'min:4|max:20|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min::4|max:20',
            'date_of_birth' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id'  => 'required',
            'city_id' => 'required'
        ];
    }
}
