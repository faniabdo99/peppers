<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('active');
            $table->integer('value')->nullable();
            $table->string('type')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
