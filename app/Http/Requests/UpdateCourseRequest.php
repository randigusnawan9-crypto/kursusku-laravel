<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('courses', 'slug')->ignore($course),
            ],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration' => ['required', 'integer', 'min:1'],
            'start_date' => ['nullable', 'date'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Nama kursus wajib diisi.',
            'title.min' => 'Nama kursus minimal 3 karakter.',
            'title.max' => 'Nama kursus maksimal 255 karakter.',
            'slug.unique' => 'Slug kursus sudah digunakan.',
            'price.required' => 'Harga kursus wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
            'duration.required' => 'Durasi kursus wajib diisi.',
            'duration.integer' => 'Durasi harus berupa bilangan bulat.',
            'duration.min' => 'Durasi minimal 1.',
            'start_date.date' => 'Tanggal mulai tidak valid.',
        ];
    }
}
