<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bundle_id')->references('id')->on('bundles')->onDelete('cascade');
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('quantity')->default(1);
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
        Schema::dropIfExists('bundle_order');
    }
}
