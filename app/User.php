<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
    
    public function shop()
    {
//        return $this->belongsToMany(Shop::class)->withPivot('type')->withTimestamps();
        return $this->belongsToMany(Shop::class);
    }
    public function favoriteings()
    {
        return $this->belongsToMany(Shop::class, 'user_favorite', 'user_id', 'favorite_id')->withTimestamps();
    }
        public function favorite($shopId)
    {
        // confirm if already favoriteing
        $exist = $this->is_favoriteing($shopId);
        // confirming that it is not you
        //$its_me = $this->id == $userId;
    
        if ($exist) {
            // do nothing if already favoriteing
            return false;
        } else {
            // favorite if not favoriteing
            $this->favoriteings()->attach($shopId);
            return true;
        }
        }
    public function unfavorite($shopId)
    {
        // confirming if already favoriteing
        $exist = $this->is_favoriteing($shopId);
        // confirming that it is not you
        //$its_me = $this->id == $userId;
    
    
        if ($exist) {
            // stop favoriteing if favoriteing
            $this->favoriteings()->detach($shopId);
            return true;
        } else {
            // do nothing if not favoriteing
            return false;
        }
    }
    
    
    public function is_favoriteing($shopId) {

        return $this->favoriteings()->where('favorite_id', $shopId)->exists();
    }
}


