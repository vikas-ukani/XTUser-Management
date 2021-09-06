<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'email' => 'required|min:3|max:50|email|unique:users',
            'username' => 'required|min:3|max:50|unique:users',
            'mobile' => 'required|min:3|max:50|unique:users',
            'password' => 'min:4|max:20|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min::4|max:20',
            'profile_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'date_of_birth' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id'  => 'required',
            'city_id' => 'required'
        ];
    }

    /** User Can Save Directly Here */
    public function store()
    {
        return User::create($this->validated());
    }
}
