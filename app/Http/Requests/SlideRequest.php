<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
                    "title"=> "required",
                    "description"=> "required",
                    "image"=> "nullable|mimes:jpeg,gif,png,jpg",
                    "status"=> "required",
                ];
            }else{
                return [
                    "title"=> "required",
                    "description"=> "required",
                    "image"=> "required|mimes:jpeg,gif,png,jpg",
                    "status"=> "required",
                ];
            }
    }
}
