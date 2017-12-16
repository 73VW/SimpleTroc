<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('barter_id');
            $table->boolean('isUserLeftClose')->default(false); //user : make the barter
            $table->boolean('isUserRightClose')->default(false); //user : accept the offer
            $table->timestamps();
        });

        Schema::create('talk_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('talk_id');
            $table->primary(['user_id', 'talk_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talks');
        Schema::dropIfExists('talk_user');
    }
}
