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
    public function favoriteings()
    {
        return $this->belongsToMany(User::class, 'user_favorite', 'user_id', 'favorite_id')->withTimestamps();
    }
    public function favorite($userId)
{
    // confirm if already favoriteing
    $exist = $this->is_favoriteing($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already favoriteing
        return false;
    } else {
        // favorite if not favoriteing
        $this->favoriteings()->attach($userId);
        return true;
    }
}

public function unfavorite($userId)
{
    // confirming if already favoriteing
    $exist = $this->is_favoriteing($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // stop favoriteing if favoriteing
        $this->favoriteings()->detach($userId);
        return true;
    } else {
        // do nothing if not favoriteing
        return false;
    }
}


public function is_favoriteing($userId) {
    return $this->favoriteings()->where('favorite_id', $userId)->exists();
}
}
