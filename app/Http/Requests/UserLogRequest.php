<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules() : array
    {
        return [
            'mood' => 'required|min:2|max:255',
            'weather' => 'required|min:2|max:255',
            'gps' => 'required|min:10|max:255',
            'note' => 'required|min:2|max:255',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<mixed>
     */
    public function attributes() : array
    {
        return [
            //
        ];
    }
}
