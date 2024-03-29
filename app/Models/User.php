<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'image',
        'imageFile',
        'role_id',
        'newsletter',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
    public function comblog(){
        return $this->hasMany(Comblog::class);
    }
    public function panier(){
        return $this->hasOne(Panier::class);
    }
    public function produits(){
        return $this->belongsToMany(Produit::class,'produit_users');
    }
    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
