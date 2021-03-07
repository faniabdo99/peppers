<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration{
    public function up(){
        Schema::create('users', function (Blueprint $table) {
    		$table->id();
    		$table->string('name');
    		$table->string('email');
    		$table->string('password');
    		$table->string('phone_number')->nullable();
    		$table->string('country')->nullable();
    		$table->string('city')->nullable();
    		$table->string('street_address')->nullable();
    		$table->string('zip_code')->nullable();
    		$table->string('image')->default('user.jpg');
    		$table->string('role')->default('1');
    		$table->integer('code');
    		$table->integer('confirmed')->default('0');
    		$table->string('auth_provider')->default('Signup');
    		$table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('users');
    }
}
