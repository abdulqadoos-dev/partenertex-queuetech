<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_order_product_id')->references('id')->on('inventory_order_products')->onDelete('cascade');
            $table->foreignId('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
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
        Schema::dropIfExists('inventory_orders');
    }
}
