<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->string('job');
            $table->string('description');
            $table->string('image');
             $table->integer('user_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
