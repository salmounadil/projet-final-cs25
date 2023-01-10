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
        Schema::create('comblogs', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom'); 
            $table->string('email'); 
            $table->string('site'); 
            $table->string('date'); 
            $table->string('message'); 
            $table->foreignId('blog_id')->constrained(); 
            $table->foreignId('user_id')->nullable()->constrained(); 
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
        Schema::dropIfExists('comblogs');
    }
};
