<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'date_start' => 'nullable|date|before_or_equal:date_end',
            'date_end' => 'nullable|date|after_or_equal:date_start',
        ];
    }

    public function messages()
    {
        return [
            'date_start.date' => 'O campo data inicial deve ser uma data válida.',
            'date_end.date' => 'O campo data final deve ser uma data válida.',
            'date_start.before_or_equal' => 'A data inicial deve ser anterior ou igual à data final.',
            'date_end.after_or_equal' => 'A data final deve ser posterior ou igual à data inicial.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'date_start' => $this->input('date_start', now()->subDays(30)->format('Y-m-d')),
            'date_end' => $this->input('date_end', now()->format('Y-m-d')),
        ]);
    }
}

