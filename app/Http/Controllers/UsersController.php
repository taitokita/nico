<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Shop;
use App\Tag;
use App\Review;
use App\Image;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
         
         $shops = \DB::table('shops')
                 ->join('user_favorite', 'shops.id', '=', 'user_favorite.favorite_id')
                 ->select('shops.*')
                 ->where('user_favorite.user_id', $user->id)
                 ->distinct()
                 ->paginate(20);
        $shops1 = \DB::table('shops')
                 ->join('reviews', 'shops.id', '=', 'reviews.shop_id')
                 ->select('shops.*')
                 ->where('reviews.user_id', $user->id)
                 ->distinct()
                 ->paginate(20);
        $tags = Tag::All();
        
        $data = [
            'shops' => $shops,
            'shops1' => $shops1,
            'user' => $user,
            'reviews' => $reviews,
            'tags' => $tags,
            
        ];
        $data += $this->counts($user);

        return view('users.show', $data);
    }
   
    
     public function favoriteings($id)
    {
        $user = User::find($id);
        $shops = $user->shops()->orderBy('created_at', 'desc')->paginate(10);
        $favoriteings = $shop->favoriteings()->paginate(10);
        

        $data = [
            'user' => $user,
            'users' => $favoriteings,
            'favoriteings' => $favoriteings,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function counts($user) {
        $count_shops = $user->shops()->count();
        
        $count_favoriteings = $user->favoriteings()->count();
        $count_reviews = $user->reviews()->count();

        return [
            'count_shops' => $count_shops,
            'count_favoriteings' => $count_favoriteings,
            'count_reviews' => $count_reviews,
        ];
    }
}