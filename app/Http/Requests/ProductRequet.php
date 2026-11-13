<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequet extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            // Basic Information
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
            ],

            'description' => [
                'required',
                'string',
                'max:5000',
            ],

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'brand_id' => [
                'required',
                'integer',
                'exists:brands,id',
            ],

            // Audience Types
            'types_of_audiance' => [
                'required',
                'array',
                'min:1',
            ],

            'types_of_audiance.*' => [
                'required',
                'integer',
                'distinct',
                'exists:types,id',
            ],

            // Product Status
            'status' => [
                'required',
                Rule::in(['0', '1']),
            ],

            // Pricing Information
            'purchase_price' => [
                'nullable',
                'numeric',
                'min:0',
                'decimal:0,2',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
                'decimal:0,2',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'between:0,100',
                'decimal:0,2',
            ],

            // Inventory & Shipping
            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'weight' => [
                'nullable',
                'numeric',
                'min:0',
                'decimal:0,2',
            ],

            // Multiple Product Images
            'images' => [
                'required',
                'array',
                'min:1',
                'max:10',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Primary Image Selection
            'primary_image_index' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [

            // Basic Information
            'name.required' => 'Please enter the product name.',
            'name.min' => 'Product name must contain at least 2 characters.',
            'name.max' => 'Product name cannot exceed 255 characters.',

            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',

            'brand_id.required' => 'Please select a brand.',
            'brand_id.exists' => 'The selected brand is invalid.',

            // Audience Types
            'types_of_audiance.required' => 'Please select at least one audience type.',
            'types_of_audiance.min' => 'Please select at least one audience type.',
            'types_of_audiance.*.exists' => 'The selected audience type is invalid.',

            // Status
            'status.required' => 'Please select the product status.',
            'status.in' => 'The selected product status is invalid.',

            // Pricing
            'purchase_price.numeric' => 'Purchase price must be a valid number.',
            'purchase_price.min' => 'Purchase price cannot be negative.',

            'price.required' => 'Please enter the selling price.',
            'price.numeric' => 'Selling price must be a valid number.',
            'price.min' => 'Selling price cannot be negative.',

            'discount.numeric' => 'Discount must be a valid number.',
            'discount.between' => 'Discount must be between 0 and 100.',

            // Inventory
            'stock.required' => 'Please enter the stock quantity.',
            'stock.integer' => 'Stock quantity must be a whole number.',
            'stock.min' => 'Stock quantity cannot be negative.',

            'weight.numeric' => 'Weight must be a valid number.',
            'weight.min' => 'Weight cannot be negative.',

            // Multiple Images
            'images.required' => 'Please upload at least one product image.',
            'images.array' => 'Invalid image upload.',
            'images.min' => 'Please upload at least one product image.',
            'images.max' => 'You can upload a maximum of 10 images.',

            'images.*.required' => 'Please select a product image.',
            'images.*.image' => 'Every uploaded file must be an image.',
            'images.*.mimes' => 'Images must be JPG, JPEG, PNG, or WEBP.',
            'images.*.max' => 'Each image must not exceed 2 MB.',

            // Primary Image
            'primary_image_index.required' => 'Please select a primary product image.',
            'primary_image_index.integer' => 'Invalid primary image selection.',
            'primary_image_index.min' => 'Invalid primary image selection.',
        ];
    }

    /**
     * Validate that the selected primary image index exists.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {

            $images = $this->file('images', []);
            $primaryIndex = $this->input('primary_image_index');

            if (
                is_array($images) &&
                is_numeric($primaryIndex) &&
                (int) $primaryIndex >= 0 &&
                (int) $primaryIndex >= count($images)
            ) {
                $validator->errors()->add(
                    'primary_image_index',
                    'The selected primary image is invalid.'
                );
            }
        });
    }
}
