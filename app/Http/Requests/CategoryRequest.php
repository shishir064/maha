<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          
    'name' => [
        'required',
        'string',
        'min:2',
        'max:100',
    ],

    // 'slug' => [
    //     'required',
    //     'string',
    //     'max:120',
    //     'alpha_dash',
    //     'unique:categories,slug',
    // ],

    'description' => [
        'nullable',
        'string',
    ],

    'status' => [
        'required',
        'boolean',
    ],

    'sort_order' => [
        'required',
        'integer',
        'min:0',
        'max:999999',
    ],

     'image' => $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ];
    }
}
