<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'service_id' => 'required|integer|exists:services,id',
            'date' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Usługa jest wymagana',
            'service_id.integer' => 'Niewłaściwy typ danych',
            'service_id.exists' => 'Wybrana usługa nie istnieje',
            'date.required' => 'Data jest wymagana',
            'date.date_format' => 'Format daty jest nieprawidłowy',
        ];
    }
}
