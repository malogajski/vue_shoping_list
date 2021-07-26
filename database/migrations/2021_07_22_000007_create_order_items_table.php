<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('quantity', 15, 2);
            $table->decimal('real_price', 15, 2)->nullable();
            $table->boolean('purchased')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
