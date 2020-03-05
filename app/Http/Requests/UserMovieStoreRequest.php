<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMovieStoreRequest extends FormRequest
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
            'movie' => 'required|numeric|exists:movies,id',
            'acting' => 'required|numeric|between:1,10'
        ];
    }
}