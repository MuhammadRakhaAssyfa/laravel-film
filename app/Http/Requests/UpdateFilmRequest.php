<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
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
            'title'    => 'required|min:2',
            'sinopsis' => 'required|min:20',
            'year'     => 'required|integer|min:1900|max:2100',
            'genre_id' => 'required|exists:genres,id',
            'poster'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
