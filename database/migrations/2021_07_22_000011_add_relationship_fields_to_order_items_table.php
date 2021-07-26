<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'order_fk_4435683')->references('id')->on('orders');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id', 'store_fk_4435684')->references('id')->on('stores');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id', 'item_fk_4435685')->references('id')->on('items');
        });
    }
}
