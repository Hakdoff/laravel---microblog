<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Or implement your authorization logic here
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'profilepic' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
            'coverpic' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
        ];
    }
}
