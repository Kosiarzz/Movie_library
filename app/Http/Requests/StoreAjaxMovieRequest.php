<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAjaxMovieRequest extends FormRequest
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
            "data.title" => 'required|string|max:100',
            "data.year" => 'nullable|integer|min:0|max:9999',
            "data.original_title" => "nullable|string|max:100",
            "data.genres" => "nullable|string|max:50",
            "data.country" => "nullable|string|max:30",
            "data.time" => "nullable|string|max:100",
            #"data.rate" => "nullable|min:0|max:10",
            "data.description" => "nullable|string|max:500",
            "data.directors" => 'nullable|string|max:1000',
            "data.cast" => 'nullable|string|max:1000',
            #"data.votes" => "nullable|string|max:10",
            "data.img" => 'nullable|string|max:1000',
        ];
    }
}
