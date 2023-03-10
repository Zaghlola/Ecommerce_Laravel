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
        Schema::create('product_spec', function (Blueprint $table) {
            $table->foreignId('spec_id')->constrained()
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('value');
            $table->primary(['spec_id','product_id']);
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
        Schema::dropIfExists('product_spec');
    }
};
