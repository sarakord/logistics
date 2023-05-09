<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsignmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'motorcycle_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'motorcycle_id.required' => 'Choosing motorcycle is required.',
        ];
    }
}
