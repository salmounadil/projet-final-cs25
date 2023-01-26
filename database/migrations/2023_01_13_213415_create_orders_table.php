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
            $table->id()->startingValue(60235);
            $table->double('total');
            $table->string('firstname');
            $table->string('date');
            $table->string('lastname');
            $table->string('email');
            $table->string('methode');
            $table->string('ville');
            $table->integer('user_id');
            $table->integer('codepostal');
            $table->string('adresse');
            $table->string('tel');
            $table->string('pays');
            $table->json('produits');
            $table->integer('quantité')->default(0);
            $table->boolean('confirmé')->default(false);
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
