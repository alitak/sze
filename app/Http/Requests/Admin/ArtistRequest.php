<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }
}
