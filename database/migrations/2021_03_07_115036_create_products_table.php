<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration{
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('status');
            $table->string('image');
            $table->string('sku');
            $table->string('color');
            $table->string('condition');
            $table->text('description');
            $table->string('buy_price');
            $table->string('price');
            $table->text('content');
            $table->string('size');
            $table->integer('height');
            $table->integer('width');
            $table->integer('depth');
            $table->integer('qty');
            $table->integer('in_stock')->default(1);
            $table->string('for_gender')->nullable();
            $table->string('store_location');
            $table->text('comments')->nullable();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('discount_id')->nullable();
            $table->integer('is_featured')->default(0);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('products');
    }
}
