<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration{
    public function up(){
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number');
            $table->string('total_amount')->default('0');
            $table->string('is_paid')->default('no');
            $table->string('payment_id')->default('0');
            $table->string('payment_method')->default('0');
            $table->string('total_shipping_cost')->default('0');
            //Order User Data
            $table->string('user_id')->default('1');
            $table->string('name')->default('Default');
            $table->string('phone_number')->default('Company Phone Number');
            $table->string('email')->default('Default User Email');
            $table->string('address')->default('Default Address');
            $table->string('address_2')->nullable();
            $table->string('country')->default('Default Shipping Country');
            $table->string('city')->default('Default City');
            $table->string('zip_code')->default('Default Zip Code');
            //Additional Data
            $table->integer('invoice_id')->nullable();
            $table->text('order_notes')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
