<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
            'name' => 'required|max:64|string',
            'description' => 'required|max:254|string',
            'gender' => ['required', 'string', Rule::in(Gender::cases())]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa usługi jest wymagana.',
            'name.max:64' => 'Nazwa jest za długa.',
            'name.string' => 'Nazwa powinna być tekstem.',
            'description.required' => 'Opis jest wymagany.',
            'description.max:254' => 'Opis jest za długi.',
            'description.string' => 'Opis powinien być tekstem.',
            'gender.required' => 'Płeć jest wymagana.',
            'gender.string' => 'Płeć powinna być tekstem.',
            'gender.in' => 'Nie prawidłowa wartość.'
        ];
    }
}
