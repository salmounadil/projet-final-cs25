<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
    public function couleur(){
        return $this->belongsTo(Couleur::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function produitpanier(){
        return $this->belongsTo(Produitpanier::class);
    }
}
