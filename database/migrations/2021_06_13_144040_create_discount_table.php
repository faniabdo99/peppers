<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('value')->nullable();
            $table->string('type')->nullable();
            $table->string('expire')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
