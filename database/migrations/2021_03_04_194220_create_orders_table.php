<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('courier');
            $table->string('service');
            $table->integer('cost');
            $table->string('estimation');
            $table->integer('code')->nullable();
            $table->string('status')->default(0);
            $table->string('phone');
            $table->string('address');
            $table->integer('total_price');
            $table->integer('total_weight');
            $table->timestamps();
            $table->softDeletes();
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
