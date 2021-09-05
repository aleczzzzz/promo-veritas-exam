<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionRequest extends FormRequest
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
            "client_id" => [
                'required',
                'exists:clients,id'
            ],
            "name" => [
                'required',
                'string'
            ],
            "slug" => [
                'required',
                'string'
            ],
            "description" => [
                'nullable',
                'string'
            ],
            "fields" => [
                'required',
                'json'
            ],
            "fields.*.field" => [
                'required'
            ],
            "fields.*.type" => [
                'required',
                'in:text,textarea,checkbox'
            ],
            "mechanic_id" => [
                'required',
                'exists:mechanics,id'
            ],
            "winning_moment_time" => [
                'nullable',
                'date'
            ],
        ];
    }
}
