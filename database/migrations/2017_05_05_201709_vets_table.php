<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VetsTable extends Migration
{

    public function up()
    {
        Schema::create('vets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->integer('phoneNumber');
            $table->string('password', 60);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('vets');
    }
}