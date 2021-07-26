<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
