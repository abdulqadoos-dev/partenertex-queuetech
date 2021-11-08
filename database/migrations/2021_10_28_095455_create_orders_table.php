<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade');
            $table->string('order_no')->default(Str::upper(Str::random(15)));
            $table->string('receipt_date')->nullable();
            $table->string('cutting_date')->nullable();
            $table->string('sewing_date')->nullable();
            $table->string('packing_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_method')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
