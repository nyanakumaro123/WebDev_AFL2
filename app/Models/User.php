<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'email', 'password', 'status'];

    protected $hidden = ['password', 'remember_token'];

    
    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }
    
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class)
        ->withTimestamps();
    }
}
