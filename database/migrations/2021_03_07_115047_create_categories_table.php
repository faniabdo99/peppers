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
            $table->string('type');
            $table->string('gender')->default('men');
            $table->string('image')->default('category.jpg');
            $table->integer('is_featured')->default(0);
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('categories');
    }
}
