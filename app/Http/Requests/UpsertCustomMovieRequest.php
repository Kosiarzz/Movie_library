<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpsertCustomMovieRequest extends FormRequest
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

    public function messages()
    {
        return [
            'title.required' => 'Tytuł filmu jest wymagany!',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imgLink' => 'nullable|string|max:1000',
            'imgFile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1000',
            'title' => 'required|string|max:100',
            'year' => 'nullable|integer|min:0|max:9999',
            "original_title" => "nullable|string|max:100",
            "genre" => "nullable|string|max:50",
            "country" => "nullable|string|max:30",
            "time" => "nullable|string|max:100",
            "rate" => "nullable|numeric|between:0, 10.0",
            "description" => "nullable|string|max:500",
            "directors" => 'nullable|array|max:20',
            "directors.*" => 'string|max:100',
            "actors" => 'nullable|array|max:20',
            "actors.*" => 'string|max:100',
            "categories" => 'nullable|array|max:50',
            "categories.*" => 'string|max:100',
            "groups" => 'nullable|array',
            "votes" => "nullable|string|max:10",
            "watched" => Rule::in(['true']),
            "imgDelete" => Rule::in(['true']),
        ];
    }
}
