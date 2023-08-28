<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "create_post_title" => ["required"],
            "create_post_content" => ["required"],
        ];
    }
    public function messages()
    {
        return [
            "create_post_title.required" => "lütfen blog başlığı giriniz",
            "create_post_content.required" => "lütfen blog içeriği giriniz",
        ];
    }
}
