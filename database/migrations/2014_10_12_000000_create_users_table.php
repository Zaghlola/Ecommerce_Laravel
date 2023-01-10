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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone',11)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable(); 
            $table->timestamp('phone_verified_at')->nullable();            
            $table->integer('verification_code')->nullable();
            $table->timestamp('code_expired_at')->nullable(); 
            $table->boolean('status')->comment('1 => active , 0 => not active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
