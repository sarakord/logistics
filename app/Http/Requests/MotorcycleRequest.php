<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MotorcycleRequest extends FormRequest
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
            'driver' => ['required', Rule::unique('motorcycles')->ignore($this->motorcycle), 'min:3'],
            'license_plate' => ['required', Rule::unique('motorcycles')->ignore($this->motorcycle)],
        ];
    }

    public function messages(): array
    {
        return [
            'driver.required' => 'Driver name is required.',
            'driver.unique' => 'The driver has already been taken',
            'driver.min' => 'The driver name field must be at least 2 characters',
            'license_plate.required' => 'License plate is required.',
            'license_plate.unique' => 'The license plate has already been taken',
        ];
    }
}
