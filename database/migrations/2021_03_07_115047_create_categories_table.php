<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCategoriesTable extends Migration{
    public function up(){
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->default('category.jpg');
            $table->integer('is_featured')->default(0);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('categories');
    }
}
