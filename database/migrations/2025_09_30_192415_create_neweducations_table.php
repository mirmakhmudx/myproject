<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('neweducations', function (Blueprint $table) {
            $table->id();
           $table->string('title');
            $table->string('description');
            $table->string('image');
             $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('neweducations');
    }
};
