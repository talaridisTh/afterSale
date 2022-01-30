<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcsTable extends Migration {

    public function up()
    {
        Schema::create('acs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string("return_type")->nullable();
            $table->boolean("return_service");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acs');
    }

}