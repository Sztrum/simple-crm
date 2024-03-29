<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogCategoryProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('g3a1_catalog_category_product')->insert([
            ['product_id' => 1, 'category_id' => 101],
            ['product_id' => 1, 'category_id' => 102],
            ['product_id' => 2, 'category_id' => 103],
            ['product_id' => 3, 'category_id' => 104],
            ['product_id' => 3, 'category_id' => 105],
        ]);
    }
}