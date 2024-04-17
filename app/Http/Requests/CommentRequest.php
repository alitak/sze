<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'book_id' => ['required', 'int', Rule::exists('books', 'id')],
            'content' => ['required', 'string', 'min:1', 'max:1000'],
        ];
    }
}
