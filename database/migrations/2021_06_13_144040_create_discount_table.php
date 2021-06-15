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
            $table->string('title');
            $table->string('value');
            $table->string('type');
            $table->string('expire');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
