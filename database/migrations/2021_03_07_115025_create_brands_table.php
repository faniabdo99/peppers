<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration{
    public function up(){
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->default('brand.jpg');
            $table->integer('is_featured')->default(0);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('brands');
    }
}
