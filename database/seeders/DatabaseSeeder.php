<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use App\Models\Product;
use App\Models\product as ModelsProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        /*$this->call(CategorySeeder::class);*/

        category::factory(count: 100)->create();
        product::factory(count: 200)->create();

    }
}
