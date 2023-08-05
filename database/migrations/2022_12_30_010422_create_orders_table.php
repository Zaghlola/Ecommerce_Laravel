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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->boolean('status')->comment('1 => active ,0 => not active')->default(1);
            $table->decimal('total_price',10,2);
            $table->decimal('final_price',10,2);
            $table->timestamp('deliverd_date')->nullable(); 
            $table->foreignId('address_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();

           
            $table->unsignedBigInteger('payment_id');
 
            $table->foreign('payment_id')->references('id')->on('payment')
            ->constrained()->restrictOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('coupon_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
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
};
