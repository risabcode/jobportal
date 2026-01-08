<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'          => ['required', 'string', 'max:100'],
            'last_name'           => ['required', 'string', 'max:100'],
            'email'               => ['required', 'email', 'max:255'],

            // Optional but supported fields
            'phone'               => ['nullable', 'string', 'max:20'],
            'preferred_location'  => ['nullable', 'string', 'max:100'],
            'experience_years'    => ['nullable', 'numeric', 'between:0,50'],
            'notes'               => ['nullable', 'string', 'max:1000'],

            // Resume
            'resume'              => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120', // 5MB
            ],
        ];
    }
}
