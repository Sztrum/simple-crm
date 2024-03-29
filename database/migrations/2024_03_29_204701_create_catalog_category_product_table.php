<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('g3a1_catalog_category_product', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('category_id');
            $table->primary(['product_id', 'category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('g3a1_catalog_category_product');
    }
}