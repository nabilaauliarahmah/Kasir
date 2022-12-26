<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Pakaian Dewasa'],
            ['name' => 'Pakaian Anak'],
        ];
        foreach($categories as $category){
            ItemCategory::create($category);
        }
    }

}
