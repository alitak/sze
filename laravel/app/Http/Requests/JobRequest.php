<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:1024'],
            'delete_image' => ['nullable', 'boolean'],
            'company_id' => ['required', 'numeric', Rule::exists('companies', 'id')],
            'tag_ids' => ['nullable', 'array'],
            'tag_ids.*' => ['required', 'numeric', Rule::exists('tags', 'id')],
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation()
    {
        if (auth()->user()->is_company_admin) {
            $this->merge([
                'company_id' => auth()->user()->company_id,
            ]);
        }
    }
}
