<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogCategoryEntityIntSeeder extends Seeder
{
    public function run()
    {
        DB::table('g3a1_catalog_category_entity_int')->insert([
            ['entity_id' => 101, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 102, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 103, 'attribute_id' => 46, 'value' => 0],
            ['entity_id' => 104, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 105, 'attribute_id' => 46, 'value' => 1],
        ]);
    }
}