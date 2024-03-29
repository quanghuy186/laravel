<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = new City();
        $city->id = 1;
        $city->name = 'Hà Nội';
        $city->save();
    
        $city = new City();
        $city->id = 2;
        $city->name = 'Hồ Chí Minh';
        $city->save();
    
        $city = new City();
        $city->id = 3;
        $city->name = 'Hải Phòng';
        $city->save();
    
        $city = new City();
        $city->id = 4;
        $city->name = 'Hải Dương';
        $city->save();
    }
}