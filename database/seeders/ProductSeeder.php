<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //fake dữ liệu
        $products = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $products[] = [
        //         'name' => fake()->name(),
        //         'description' => fake()->text(),
        //         'image' => fake()->imageUrl(),
        //         'price' => fake()->randomFloat(2, 0, 100),
        //         'category_id' => fake()->numberBetween(1, 10),
        //         'status' => fake()->randomElement([0, 1]),
        //         'stock' => fake()->numberBetween(0, 100),
        //         'views' => fake()->numberBetween(0, 100),
        //         'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        //         'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        //     ];
        // }

        // fake dữ liệu cho category số 11 thôi
        for ($i = 0; $i <5; $i++) {
            $products[] = [
                'name' => fake()->name(),
                'description' => fake()->text(),
                'image' => fake()->imageUrl(),
                'price' => fake()->randomFloat(2, 0, 100),
                'category_id' => 11,
                'status' => fake()->randomElement([0, 1]),
                'stock' => fake()->numberBetween(0, 100),
                'views' => fake()->numberBetween(0, 100),
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
                'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ];
        }
        DB::table('products')->insert($products);
    }
}
// câu lệnh chạy seeder
// php artisan db:seed --class=ProductSeeder
