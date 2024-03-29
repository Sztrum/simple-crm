<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class entity extends Controller
{
    //  private $isProduction;

      private $names_to_exclude = [
        /* default */ '0' => ['Default Category','Products', 'New products', 'Projects', 'Public Spaces', 'Residential interiors', 'Office', 'Medical Facilities', 'Restaurants'],
        /* en */ '2' => ['Default Category','Products', 'New products', 'Projects', 'Public Spaces', 'Residential interiors', 'Office', 'Medical Facilities', 'Restaurants'],
        /* es */ '3' => ['Default Category','Productos', 'Novedades', 'Proyectos', 'Espacios Públicos', 'La oficina en casa', 'Oficina', 'Centros sanitarios', 'Restaurantes'],
        /* de */ '4' => ['Default Category','Produkte', 'Neuigkeiten', 'Realisierungen', 'Öffentliche Räume', 'Home Office', 'Büro', 'Medizinische Praxis', 'Restaurantes'],
        /* fr */ '5' => ['Default Category','Produits', 'Nouveautés', 'Réalisation', 'Espaces publics', 'Intérieurs résidentiels', 'Bureau', 'Structures médicales', 'Restaurants'],
        /* pl */ '6' => ['Default Category','Produkty', 'Nowości', 'Realizacje', 'Przestrzenie publiczne', 'Wnętrza mieszkalne', 'Biuro', 'Placówki medyczne', 'Restauracje'],
        /* it */ '11' => ['Default Category','Prodotti', 'Nuovi prodotti', 'Progetti', 'Spazi Pubblici', 'Interni residenziali', 'Ufficio', 'Strutture sanitarie', 'Ristoranti'],
      ];
    
      public function chain_category_with_products() {
    
        // $magentoData = new MagentoData();
        // $this->isProduction = config('constants.is-production');
        // $dbType = $magentoData->getActiveDb($this->isProduction?null:'dev');
    
        // product_id and search_tags
        $products_id = DB::connection('mysql')
          ->select("
            SELECT `entity_id`, `value`, `store_id` FROM g3a1_catalog_product_entity_text WHERE `attribute_id` = 701 AND `store_id` IN (0,2, 3, 4, 5, 6, 11);
        ");
    
        // select
        // SELECT productCategory.product_id, categoryName.value as name, productCategory.category_id, categoryEnable.value as enable, categoryName.store_id, categoryNameDefault.value as nameDefault
        // FROM g3a1_catalog_category_product as productCategory
        // LEFT JOIN g3a1_catalog_category_entity_int AS categoryEnable ON categoryEnable.entity_id = productCategory.category_id AND categoryEnable.attribute_id = 46
        // LEFT JOIN g3a1_catalog_category_entity_varchar as categoryName ON categoryName.entity_id = productCategory.category_id AND categoryName.attribute_id = 45
        // LEFT JOIN g3a1_catalog_category_entity_varchar as categoryNameDefault ON categoryNameDefault.entity_id = productCategory.category_id AND categoryNameDefault.attribute_id = 45 AND categoryNameDefault.store_id = 0
        // WHERE categoryEnable.value = 1 ORDER BY productCategory.product_id
    
        // category names in all stores lang, and product_id
        $category_names = DB::connection('mysql')
          ->select("
            SELECT productCategory.product_id, categoryName.value as name, productCategory.category_id, categoryEnable.value as enable, categoryName.store_id FROM g3a1_catalog_category_product as productCategory
            LEFT JOIN g3a1_catalog_category_entity_int AS categoryEnable ON categoryEnable.entity_id = productCategory.category_id AND categoryEnable.attribute_id = 46
            LEFT JOIN g3a1_catalog_category_entity_varchar as categoryName ON categoryName.entity_id = productCategory.category_id AND categoryName.attribute_id = 45
            WHERE categoryEnable.value = 1 AND categoryName.store_id IN (0, 2, 3, 4, 5, 6, 11) ORDER BY productCategory.product_id
          ");
    
        $category_arr = json_encode($category_names, true);
        $category_arr = json_decode($category_arr, true);
    
        $products_arr = json_encode($products_id, true);
        $products_arr = json_decode($products_arr, true);
        $products_array = array();
        
        foreach ($products_arr as $value) {
          $categories = array_filter($category_arr, function($category) use ($value){
            return $category['product_id'] === $value['entity_id'];
          });
        
          $filtered_categories = array_filter($categories, function($category) use ($value) {
            return $category['store_id'] === $value['store_id'];
          });    
        
          $category_names_array = array_map(function ($category) use ($value) {
            $storeId = strval($value['store_id']);
            $default_name = '';
            if ($category['name'] === '') {
              $default_category = array_filter($this->names_to_exclude[$storeId], function($item) use ($category) {
                return $item === $category['store_id'];
              });
              $default_name = !empty($default_category) ? reset($default_category) : '';
            }
            return $category['name'] !== '' ? $category['name'] : $default_name;
          }, $filtered_categories);
        
          $category_names_array = array_filter($category_names_array, function($category_name) use ($value) {
            $storeId = strval($value['store_id']);
            return !in_array($category_name, $this->names_to_exclude[$storeId], true);
          });
    
          $category_names = implode(", ", $category_names_array);
          $search_tags_array = explode(",", $value['value']);
    
          $new_search_tags_array = [];

          foreach ($search_tags_array as $search_tag) {
              // Sprawdzamy, czy wyraz z search_tags_array nie znajduje się w category_names_array
              if (!in_array($search_tag, $category_names_array)) {
                  $new_search_tags_array[] = $search_tag;
              }
          }
  
          $new_search_tags = implode(", ", $new_search_tags_array);
          $category_store_id = !empty($filtered_categories) ? reset($filtered_categories)['store_id'] : null;
          $products_array[] = [
              'product_id' => $value['entity_id'],
              'search_tags' => $value['value'],
              'lang' => $value['store_id'],
              'category_names' => $category_names,
              'new_category_names' => $new_search_tags,
              'category_store_id' => $category_store_id,
          ];
  
          echo "New category names for product " . $value['entity_id'] . ": " . $new_search_tags . "<br>";
      }
    
        return view("display-entity", ['products' => $products_array]);
      }
}
