<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'year' => 'integer|min:0|max:9999',
            "original_title" => "string|max:100",
            "genre" => "string|max:50",
            "country" => "string|max:30",
            "time" => "string|max:100",
            "rate" => "integer|min:0|max:10",
            "description" => "string|max:500",
            "directors" => 'array|max:5',
            "directors.*" => 'string|max:100',
            "actors" => 'array|max:10',
            "actors.*" => 'string|max:100',
            "categories" => 'array|max:15',
            "categories.*" => 'string|max:100',
            "groups" => 'array',
            "votes" => "required|string|max:10",
            "img" => "string",
            "watched" => Rule::in(['true']),
        ];
    }
}
