<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ChanelSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('chanels')->insert([
                'name' => $faker->name(),
                'des' => $faker->paragraph(),
                'sub' => $faker->paragraph(),
                'url' => $faker->paragraph(),
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}