<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->longText("address");
            $table->string("owner_name");
            $table->string("owner_phone");
            $table->string("owner_email");
            $table->enum("payment_plan",['quarterly'],['biannual'],['annual']);
            $table->double('payment_value', 8, 2);	
            $table->enum("type",['restaurant'],['supermarket'],['other']);
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
        Schema::dropIfExists('shops');
    }
}
