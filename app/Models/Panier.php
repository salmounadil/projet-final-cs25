<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function produitsPanier(){
        return $this->hasMany(Produitpanier::class);
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
}
