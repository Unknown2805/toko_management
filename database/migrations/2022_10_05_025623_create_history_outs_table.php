<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_out_id');
            $table->integer('qty_k')->nullable();
            $table->integer('price_k')->nullable();
            $table->foreign('product_out_id')->references('id')->on('product_outs');
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
        Schema::dropIfExists('history_outs');
    }
};
