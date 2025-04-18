<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fake data
       //Tạo mảng rỗng chứa các bản ghi
       $cateSeed = [];
       for ($i = 0; $i < 5; $i++) {
           $cateSeed[] = [
                'name' => fake()->name(),
                'image' => fake()->imageUrl(640, 480, 'cats', true),
           ];
       }
       DB::table('slides')->insert($cateSeed);
    }
}
