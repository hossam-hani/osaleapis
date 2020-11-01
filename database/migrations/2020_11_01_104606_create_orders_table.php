<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->double('total', 8, 2);
            $table->double('delivery_fees', 8, 2);
            $table->enum('type',['takeaway','delivery','indoor']);
            $table->unsignedBigInteger("address_id")->nullable();
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("shop_id");
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
