<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogCategoryEntityVarcharSeeder extends Seeder
{
    public function run()
    {
        DB::table('g3a1_catalog_category_entity_varchar')->insert([
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName1'],
            ['entity_id' => 102, 'attribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName2'],
            ['entity_id' => 103, 'attribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName3'],
            ['entity_id' => 104, 'attribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName4'],
            ['entity_id' => 105, 'apttribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName5'],
            // Dodaj pozostałe dane dla innych sklepów
        ]);
    }
}