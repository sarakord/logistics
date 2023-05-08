<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Downtown;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'رها نیازی',
                'email' => 'raha@test.com',
                'password' => '1234567',
                'city_id' => City::where('name', 'اصفهان')->first()->id,
                'address' => 'میدان قدس',
                'lat' => '32.677762579566846',
                'long' => '51.68803293896633',
            ],
            [
                'name' => 'بهرنگ علوی',
                'email' => 'alavi@test.com',
                'password' => '1234568',
                'city_id' => City::where('name', 'رشت')->first()->id,
                'address' => 'مهر 81',
                'lat' => '37.2429399594579',
                'long' => '49.59083907872363',
            ],
            [
                'name' => 'هدی بیات',
                'email' => 'bayat@test.com',
                'password' => '1234569',
                'city_id' => City::where('name', 'رشت')->first()->id,
                'address' => 'میدان معلم',
                'lat' => '36.56926240342453',
                'long' => '53.071042892603856',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
