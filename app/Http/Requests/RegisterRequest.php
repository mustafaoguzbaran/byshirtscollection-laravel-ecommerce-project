<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "register_name" => ["required"],
            "register_surname" => ["required"],
            "register_username" => ["required"],
            "register_email" => ["required", "email"],
            "register_phone" => ["required"],
            "register_address" => ["required"],
            "register_password" => ["required"]
        ];
    }

    public function messages()
    {
        return [
            "register_name.required" => "lütfen isim giriniz",
            "register_surname.required" => "lütfen soyadı giriniz",
            "register_username.required" => "lütfen kullanıcı adı giriniz",
            "register_email.required" => "lütfen email giriniz",
            "register_email.email" => "lütfen geçerli bir eposta giriniz",
            "register_phone.required" => "lütfen telefon numarası giriniz",
            "register_city.required" => "lütfen şehir giriniz",
            "register_district.required" => "lütfen ilçe giriniz",
            "register_address.required" => "lütfen tam adres giriniz",
            "register_password.required" => "lütfen şifre giriniz"
        ];
    }
}
