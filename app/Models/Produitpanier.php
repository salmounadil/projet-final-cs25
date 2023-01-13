<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produitpanier extends Model
{
    use HasFactory;
    public function panier(){
        return $this->belongsTo(Panier::class);
    }
    public function produit(){
        return $this->hasOne(Produit::class);
    }
}
