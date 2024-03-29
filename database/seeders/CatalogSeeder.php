<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    public function run()
    {
        // Dodawanie rekordów do tabeli g3a1_catalog_product_entity_text
        DB::table('g3a1_catalog_product_entity_text')->insert([
            ['entity_id' => 1, 'attribute_id' => 701, 'store_id' => 0, 'value' => 'Value1'],
            ['entity_id' => 1, 'attribute_id' => 701, 'store_id' => 2, 'value' => 'Value2'],
            ['entity_id' => 2, 'attribute_id' => 701, 'store_id' => 0, 'value' => 'Value3'],
            ['entity_id' => 2, 'attribute_id' => 701, 'store_id' => 3, 'value' => 'Value4'],
            ['entity_id' => 3, 'attribute_id' => 701, 'store_id' => 0, 'value' => 'Value5'],
            ['entity_id' => 3, 'attribute_id' => 701, 'store_id' => 4, 'value' => 'Value6'],
        ]);

        // Dodawanie rekordów do tabeli g3a1_catalog_category_product
        DB::table('g3a1_catalog_category_product')->insert([
            ['product_id' => 1, 'category_id' => 101],
            ['product_id' => 1, 'category_id' => 102],
            ['product_id' => 2, 'category_id' => 103],
            ['product_id' => 3, 'category_id' => 104],
            ['product_id' => 3, 'category_id' => 105],
        ]);

        // Dodawanie rekordów do tabeli g3a1_catalog_category_entity_int
        DB::table('g3a1_catalog_category_entity_int')->insert([
            ['entity_id' => 101, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 102, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 103, 'attribute_id' => 46, 'value' => 0],
            ['entity_id' => 104, 'attribute_id' => 46, 'value' => 1],
            ['entity_id' => 105, 'attribute_id' => 46, 'value' => 1],
        ]);

        // Dodawanie rekordów do tabeli g3a1_catalog_category_entity_varchar
        DB::table('g3a1_catalog_category_entity_varchar')->insert([
            // Tutaj dodaj rekordy zgodnie z wartościami i store_id
            // Przykład:
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 0, 'value' => 'CategoryName1'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 2, 'value' => 'CategoryName1_EN'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 3, 'value' => 'CategoryName1_FR'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 4, 'value' => 'CategoryName1_ES'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 5, 'value' => 'CategoryName1_DE'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 6, 'value' => 'CategoryName1_IT'],
            ['entity_id' => 101, 'attribute_id' => 45, 'store_id' => 11, 'value' => 'CategoryName1_PL'],
        ]);
    }
}