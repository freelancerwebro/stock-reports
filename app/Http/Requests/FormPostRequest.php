<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'symbol' => [
                'required',
                'max:5',
                'exists:App\Models\Company,symbol'
            ],
            'email' => 'required|max:255',
            'start_date' => [
                'required',
                'date_format:Y-m-d',
                'before:tomorrow',
            ],
            'end_date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
            ],
        ];
    }
}
