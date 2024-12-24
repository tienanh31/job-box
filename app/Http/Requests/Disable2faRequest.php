<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Disable2faRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current-password' => 'required',
        ];
    }
}
