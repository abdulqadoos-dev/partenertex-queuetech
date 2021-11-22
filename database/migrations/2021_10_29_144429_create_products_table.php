<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('sku');
            $table->string('name');
            $table->string('material');
            $table->string('unit_sale_price');
            $table->string('unit_buy_price');
            $table->string('metraj');
            $table->string('vatelian');
            $table->string('stock');
            $table->string('dimension');
            $table->string('upc');
            $table->string('puf');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
