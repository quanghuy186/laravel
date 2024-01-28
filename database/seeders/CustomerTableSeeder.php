<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArray = [];
        for ($i = 0; $i < 20; $i++) {
            $dataArray[] = [
                'name' => STR::random(10),
                'dob' => date("Y-m-d", mt_rand(1, time())),
                'email' => STR::random(10) . '@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        DB::table('customers')->insert($dataArray);
    }
        

}