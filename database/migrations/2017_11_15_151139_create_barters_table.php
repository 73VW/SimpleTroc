<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barters', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('isClose')->default(False);
            $table->boolean('isRefuse')->default(False);
            $table->timestamps();
        });

        Schema::create('barter_product', function (Blueprint $table) {
            $table->integer('barter_id');
            $table->integer('product_id');
            $table->primary(['barter_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barters');
        Schema::dropIfExists('barter_product');
    }
}
