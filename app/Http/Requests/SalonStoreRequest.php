<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalonStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'local_number' => 'required|string|min:0',
            'post_code' => 'required|string|min:0',
            'phone_number'=> 'required|string',
            // 'opening_hours',
        ];
    }
}
