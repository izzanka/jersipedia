<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJerseysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerseys', function (Blueprint $table) {
            $table->id();
            $table->integer('league_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->integer('nameset_price')->default(5000);
            $table->integer('stock');
            $table->integer('sold')->default(0);
            $table->string('image');
            $table->integer('weight')->default(250);
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
        Schema::dropIfExists('jerseys');
    }
}
