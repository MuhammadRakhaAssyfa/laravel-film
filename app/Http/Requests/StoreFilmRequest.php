<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'    => 'required|min:2',
            'sinopsis' => 'required|min:20',
            'year'     => 'required|integer|min:1900|max:2100',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}