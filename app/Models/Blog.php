<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
    public function categoryblog(){
        return $this->belongsTo(Categoryblog::class);
    }
    public function comblog(){
        return $this->hasMany(Comblog::class);
    }
}
