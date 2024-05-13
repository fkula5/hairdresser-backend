<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeUpgradeRequest extends FormRequest
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
            'grade' => 'required|numeric|min:1|max:10',
            'appointment_id' => 'required|exists:appointments,id',
        ];
    }
    public function messages()
    {
        return [
            'grade.required' => 'Ocena jest wymagana',
            'grade.min:1' => 'Ocena jest poza skala',
            'grade.max:10' => 'Ocena jest poza skalą',
            'appointment_id.required' => 'Wizyta jest wymagana',
        ];
    }
}
