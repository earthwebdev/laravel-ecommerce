<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->get("id") != null) {
            return [
                "name"=> "required|min:4",
                "email" => "required|email|unique:users,email,". $this->get('id'),
                "password"=> "nullable|min:6|required_with:password_confirmation",
                "password_confirmation"=> "nullable|min:6|same:password|required_with:password",
                "status"=> "required",
                'is_admin'  => 'nullable',
            ];
        }else{
            return [
                "name"=> "required|min:4",
                "email" => "required|email|unique:users,email",
                "password"=> "required|min:6",
                "password_confirmation"=> "required|min:6|same:password",
                "status"=> "required",
                'is_admin'  => 'nullable',
            ];
        }
    }
}
