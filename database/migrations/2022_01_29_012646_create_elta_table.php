<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEltaTable extends Migration {

    public function up()
    {
        Schema::create('elta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean("return_service")->nullable();
            $table->boolean("express_service")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elta');
    }

}