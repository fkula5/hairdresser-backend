<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
            'employee_id' => 'integer|required|exists:employees,id',
            'comments' => 'nullable|string|max:256',
            'customer_id' => 'integer|required|exists:customers,id',
            'service_id' => 'integer|required|exists:services,id',
            'start_date' => 'date|required',
            'end_date' => 'date'
        ];
    }

    public function messages(): array
    {
        return [
            'employee_id.integer' => 'Niewłaściwy typ danych przekazanych na serwer',
            'employee_id.required' => 'Pracownik jest wymagany',
            'employee_id.exists' => 'Taki pracownik nie istnieje',
            'comments.string' => 'Niewłaściwy typ danych przekazanych na serwer',
            'comments.max' => 'Maksymalny rozmiar uwag to 256 znaków',
            'customer_id.integer' => 'Niewłaściwy typ danych przekazanych na serwer',
            'customer_id.required' => 'Klient jest wymagany',
            'customer_id.exists' => 'Taki klient nie istnieje',
            'service_id.integer' => 'Niewłaściwy typ danych przekazanych na serwer',
            'service_id.required' => 'Usługa jest wymagana',
            'service_id.exists' => 'Taka usługa nie istnieje',
            'start_date.date' => 'Data nie jest właściwa',
            'start_date.required' => 'Data jest wymagana'
        ];
    }
}
