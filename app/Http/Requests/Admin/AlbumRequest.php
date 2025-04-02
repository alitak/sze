<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlbumRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'artist_id' => ['required', 'integer', Rule::exists('artists', 'id')],
            'label_id' => ['nullable', 'integer', Rule::exists('labels', 'id')],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'duration' => ['required', 'integer', 'min:0', 'max:9999'],
        ];
    }
}
