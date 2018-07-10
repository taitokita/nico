<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'content','path'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
//     public function reviews(){
// 		// 投稿はたくさんのコメントを持つ
// 		return $this->hasMany('review', 'shop_id');
// 	}
//     public function tag(){
// 		// 投稿は1つのカテゴリーに属する
// 		return $this->belongsTo('tag','tag_id');
// 	}


    // public function want_users()
    // {
    //     return $this->users()->where('type', 'want');
    // }
}
