<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
          'button_link' => [
                'required',
                'url',
            ],

            'desktop_image' =>
     $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',


            'mobile_image' => $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',


            'start_at' => [
                'required',
                'date',
            ],

            'end_at' => [
                'required',
                'date',
                'after:start_at',
            ],

            'status' => [
                'required',
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'button_link.required' => 'Please enter the redirect URL.',
            'button_link.url' => 'Please enter a valid URL.',

            'desktop_image.required' => 'Please upload a desktop banner.',
            'desktop_image.image' => 'The desktop banner must be an image.',
            'desktop_image.mimes' => 'Desktop image must be JPG, JPEG, PNG, or WebP.',
            'desktop_image.max' => 'Desktop image must not exceed 5 MB.',

            'mobile_image.required' => 'Please upload a mobile banner.',
            'mobile_image.image' => 'The mobile banner must be an image.',
            'mobile_image.mimes' => 'Mobile image must be JPG, JPEG, PNG, or WebP.',
            'mobile_image.max' => 'Mobile image must not exceed 5 MB.',

            'start_at.required' => 'Please select the start date and time.',
            'end_at.required' => 'Please select the end date and time.',
            'end_at.after' => 'The end date must be after the start date.',

            'status.required' => 'Please select the advertisement status.',
            'status.boolean' => 'The advertisement status must be active or inactive.',
        ];
    }
}
