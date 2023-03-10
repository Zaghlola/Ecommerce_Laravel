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
        Schema::create('offer_product', function (Blueprint $table) {
            $table->integer('discount');
            $table->integer('price_after_discount');
            $table->foreignId('offer_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();          
            $table->primary(['offer_id','product_id']);
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
        Schema::dropIfExists('offer_product');
    }
};
