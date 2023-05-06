<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Downtown;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'تهران' => [
                'name' => 'شهریار',
                'lat' => '35.65854389063054',
                'long' => '51.05839788013165',
            ],
            'اصفهان' => [
                'name' => 'عباس آباد',
                'lat' => '32.64874438155563',
                'long' => '51.66687533487641',
            ],
            'شیراز' => [
                'name' => 'میدان شهید فهمیده',
                'lat' => '29.59674060503471',
                'long' => '52.53330548957487',
            ],
            'رشت' => [
                'name' => 'شهید نوری',
                'lat' => '37.28276953087885',
                'long' => '49.58328495452102',
            ],
            'ساری' => [
                'name' => 'میدان شهدا',
                'lat' => '36.56775588916706',
                'long' => '53.06590620017445',
            ],
        ];

        foreach ($cities as $city => $downtown) {
            $city = City::create([
                'name' => $city,
                'is_active' => true,
            ]);
            Downtown::craete(array_merge($downtown, ['city_id' => $city->id]));
        }
    }
}
