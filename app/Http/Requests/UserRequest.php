<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
        $validations = [
            'password' => $this->method() == 'POST' ?
                ['required', 'confirmed', Password::default()] :
                ['nullable', 'confirmed', Password::default()],
        ];
        return $validations + [
                'name' => ['required', 'min:3'],
                'address' => ['required', 'min:3'],
                'long' => ['required', 'string'],
                'lat' => ['required', 'string'],
            ];
    }

    public function messages(): array
    {
        return [
            'lon.required' => 'longitude is required',
            'lat.required' => 'latitude is required',
            'name.required' => 'Name of user is required',
            'address.required' => 'Address of user is required',
            'address.min' => 'Address field must be at least 2 characters',
            'name.min' => 'Address field must be at least 2 characters',
        ];
    }
}
