<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'slug'          => 'nullable|unique:products,slug,'.$this->get('id'),
                'price'         => 'required|decimal:2',
                'discount_percentage'   => 'nullable|decimal:2',
                'description'   => 'required',
                'status'        => 'required',
                'image'         => 'nullable|mimes:jpeg,png,jpg,gif',
                'is_featured'   => 'nullable',
                'category_id'   => 'required',
            ];
        }
        else
        {
            return [
                'title'         => 'required',
                'slug'          => 'nullable|unique:products,slug',
                'price'         => 'required|decimal:2',
                'discount_percentage'   => 'nullable|decimal:2',
                'description'   => 'required',
                'status'        => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif',
                'is_featured'   => 'nullable',
                'category_id'   => 'required',
            ];
        }
    }
}
