<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AvertisementRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $linkType = $this->input('link_type');

        $linkTable = match ($linkType) {
            'product' => 'products',
            'category' => 'categories',
            'brand' => 'brands',
            default => null,
        };

        return [
            
     'image' => $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',


            'link_type' => [
                'required',
                Rule::in(['none', 'product', 'category', 'brand']),
            ],

            'link_id' => [
                Rule::requiredIf(
                    in_array($linkType, ['product', 'category', 'brand'], true)
                ),
                'nullable',
                'integer',
                ...($linkTable
                    ? [Rule::exists($linkTable, 'id')]
                    : []),
            ],

            'position' => [
                'required',
                Rule::in([
                    'top_banner',
                    'bellowtop_banner',
                    'middle_banner',
                    'bellowmiddle_banner',
                    'bottom_banner',
                ]),
            ],

            'start_at' => [
                'required',
                'date',
            ],

            'end_at' => [
                'required',
                'date',
                'after:start_at',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:1',
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
            'image.required' => 'Please upload a banner image.',
            'image.image' => 'The banner must be a valid image.',
            'image.mimes' => 'Use a JPG, JPEG, PNG, or WebP image.',
            'image.max' => 'The banner image cannot exceed 5 MB.',

            'link_type.required' => 'Please select a link type.',
            'link_type.in' => 'Please select a valid link type.',

            'link_id.required' => 'Please select an item for this banner.',
            'link_id.exists' => 'The selected item does not exist.',

            'position.required' => 'Please select a banner position.',
            'position.in' => 'Please select a valid banner position.',

            'start_at.required' => 'Please select the banner start date and time.',
            'start_at.date' => 'Enter a valid start date and time.',

            'end_at.required' => 'Please select the banner expiry date and time.',
            'end_at.date' => 'Enter a valid expiry date and time.',
            'end_at.after' => 'The expiry must be after the start date.',

            'sort_order.required' => 'Please enter the display order.',
            'sort_order.integer' => 'The display order must be a number.',
            'sort_order.min' => 'The display order must be at least 1.',

            'status.required' => 'Please select the advertisement status.',
            'status.boolean' => 'Please select a valid status.',
        ];
    }
}
