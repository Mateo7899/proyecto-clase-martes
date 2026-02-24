<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $tecnologia = new category ();
        $tecnologia->name = "Tecnología";
        $tecnologia->description = 'Todo lo relacionado con tecnología';
        $tecnologia->save();
    }
}
