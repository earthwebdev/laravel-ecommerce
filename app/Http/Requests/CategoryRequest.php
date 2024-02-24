<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if($this->get("id") != null)
        {
            return [
                'title'         => 'required',
                'slug'          => 'nullable|unique:categories,slug,'.$this->get('id'),
                'description'   => 'required',
                'status'        => 'required',
                'image'         => 'nullable|mimes:jpeg,png,jpg,gif',
            ];
        }
        else
        {
            return [
                'title'         => 'required',
                'slug'          => 'nullable|unique:categories,slug',
                'description'   => 'required',
                'status'        => 'required',
                'image'         => 'nullable|mimes:jpeg,png,jpg,gif',
            ];
        }

    }
}
