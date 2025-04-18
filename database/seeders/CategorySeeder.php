<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fake data 10 cáitự động

        //Tạo mảng rỗng chứa các bản ghi
        $cateSeed = [];
        for ($i = 0; $i < 10; $i++) {
            $cateSeed[] = [
                'name' => fake()->name(),
                'status' => fake()->randomElement([0, 1]),
            ];
        }
        DB::table('categories')->insert($cateSeed);


    }
}
