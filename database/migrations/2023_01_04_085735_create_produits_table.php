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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('categorie_id')->nullable()->constrained();
            $table->foreignId('couleur_id')->nullable()->constrained();
            $table->string('image')->nullable();
            $table->string('imageFile')->nullable();
            $table->double('prix');
            $table->double('promo')->default(0);
            $table->double('prixfinal');
            $table->double('stock');
            $table->text('description');
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
        Schema::dropIfExists('produits');
    }
};
