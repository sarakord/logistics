<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorcycle>
 */
class MotorcycleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = City::active()->get()->pluck('id')->toArray();
        return [
            'driver' => fake()->name(),
            'license_plate' => fake()->unique()->bothify('#######'),
            'in_downtown' => fake()->boolean(),
            'city_id' => fake()->randomElement($cities),
        ];
    }
}
