<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        return [
            'nom' => 'required|min:5|string|max:255',
            'prix' => 'required|numeric|min:0',
            'categorie' => 'required|min:5|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }

    // msg error
    public function messages()
    {
        return [
            'nom.required' => 'Name is required',
            'nom.min' => 'Name must be at least 5 characters',
            'nom.max' => 'Name must not exceed 255 characters',
            'prix.required' => 'Price is required',
            'prix.numeric' => 'Price must be a number',
            'prix.min' => 'Price must be at least 0',
            'categorie.required' => 'Category is required',
            'categorie.min' => 'Category must be at least 5 characters',
            'categorie.max' => 'Category must not exceed 255 characters',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be JPEG, PNG, JPG, or GIF',
            'image.max' => 'Image must not exceed 5MB',
        ];
    }
}