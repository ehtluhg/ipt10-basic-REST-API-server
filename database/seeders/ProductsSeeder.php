<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Jacket',
            'description' => 'Given Jacket Description',
            'currency' => 'PHP',
            'price' => 1234.56,
            'brand' => 'KuyaWill',
            'category' => 'apparel',
            'image' => 'https://netstorage-kami.akamaized.net/images/0fgjhs1shmj74jpi4g.jpg?&imwidth=1200',
        ]);

        DB::table('products')->insert([
            'title' => 'Twilight Saga',
            'description' => 'Given Book Description',
            'currency' => 'PHP',
            'price' => 654.32,
            'brand' => 'DaBaTak',
            'category' => 'book',
            'image' => 'https://netstorage-kami.akamaized.net/images/0fgjhs1shmj74jpi4g.jpg?&imwidth=1200'
        ]);

        DB::table('products')->insert([
            'title' => 'Samsung Flex',
            'description' => 'Given Device Description',
            'currency' => 'PHP',
            'price' => 112233.44,
            'brand' => 'Samsung',
            'category' => 'electronic device',
            'image' => 'https://netstorage-kami.akamaized.net/images/0fgjhs1shmj74jpi4g.jpg?&imwidth=1200'
        ]);
    }
}
