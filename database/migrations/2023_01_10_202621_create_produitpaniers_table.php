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
        Schema::create('produitpaniers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image');
            $table->foreignId('produit_id')->constrained();
            $table->double('prixfinal');
            $table->double('prixtotal');
            $table->double('quantité');
            $table->foreignId('panier_id')->constrained();
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
        Schema::dropIfExists('produitpaniers');
    }
};
