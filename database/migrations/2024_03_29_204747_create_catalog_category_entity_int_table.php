<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCategoryEntityIntTable extends Migration
{
    public function up()
    {
        Schema::create('g3a1_catalog_category_entity_int', function (Blueprint $table) {
            $table->integer('entity_id');
            $table->integer('attribute_id');
            $table->integer('value');
            $table->primary(['entity_id', 'attribute_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('g3a1_catalog_category_entity_int');
    }
}