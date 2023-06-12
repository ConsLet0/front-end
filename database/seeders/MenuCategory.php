<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_categories')->insert([
            'name' => 'Fresh Meat',
            'product_category_id' => 1,
        ]);
        DB::table('menu_categories')->insert([
            'name' => 'Vegetables',
            'product_category_id' => 1,
        ]);
        DB::table('menu_categories')->insert([
            'name' => 'Coffee',
            'product_category_id' => 2,
        ]);
        DB::table('menu_categories')->insert([
            'name' => 'Milk',
            'product_category_id' => 2,
        ]);
    }
}
