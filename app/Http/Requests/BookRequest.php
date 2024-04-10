<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['nullable', 'integer', Rule::exists('book_categories', 'id')],
            'title'       => ['required', 'max:255', Rule::unique('books', 'title')->ignore($this->route('book')?->id)],
            'author'      => ['nullable', 'max:255'],
            'year'        => ['nullable', 'integer', 'min:0', 'max:2100'],
            'image'       => ['nullable', 'image', 'max:1024'],
        ];
    }
}
