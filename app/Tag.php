<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tagings()
    {
        return $this->belongsToMany(User::class, 'shop_tag', 'shop_id', 'tag_id')->withTimestamps();
    }
    public function tag($shopId)
{
    // confirm if already taging
    $exist = $this->is_taging($shopId);
    // confirming that it is not you
    $its_me = $this->id == $shopId;

    if ($exist || $its_me) {
        // do nothing if already taging
        return false;
    } else {
        // tag if not taging
        $this->tagings()->attach($shopId);
        return true;
    }
}

public function untag($shopId)
{
    // confirming if already taging
    $exist = $this->is_taging($shopId);
    // confirming that it is not you
    $its_me = $this->id == $shopId;


    if ($exist && !$its_me) {
        // stop taging if taging
        $this->tagings()->detach($shopId);
        return true;
    } else {
        // do nothing if not taging
        return false;
    }
}

public function is_taging($shopId) {
    return $this->tagings()->where('tag_id', $shopId)->exists();
}
}
