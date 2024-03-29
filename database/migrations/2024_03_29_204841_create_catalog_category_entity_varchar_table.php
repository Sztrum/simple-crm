<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCategoryEntityVarcharTable extends Migration
{
    public function up()
    {
        Schema::create('g3a1_catalog_category_entity_varchar', function (Blueprint $table) {
            $table->integer('entity_id');
            $table->integer('attribute_id');
            $table->integer('store_id');
            $table->string('value');
            $table->primary(['entity_id', 'attribute_id', 'store_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('g3a1_catalog_category_entity_varchar');
    }
}