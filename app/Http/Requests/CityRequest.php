<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'city.name' => ['required', 'min:2'],
            'downtown.name' => ['required', 'min:2'],
            'downtown.long' => ['required', 'string'],
            'downtown.lat' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'city.name.required' => 'city name is required',
            'city.name.min' => 'The city name field must be at least 2 characters',
            'downtown.name.required' => 'downtown name is required',
            'downtown.name.min' => 'The downtown name field must be at least 2 characters',
            'downtown.lon.required' => 'longitude of downtown is required',
            'downtown.lat.required' => 'latitude of downtown is required',
        ];
    }
}
