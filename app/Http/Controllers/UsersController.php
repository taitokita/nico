<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Shop;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $count_favorite = $user->favorite_shops()->count();
         
        //  $shops = Shop::all();
         $shops = \DB::table('shops')
                 ->join('user_favorite', 'shops.id', '=', 'user_favorite.favorite_id')
                 ->select('shops.*')
                 ->where('user_favorite.user_id', $user->id)
                 ->distinct()
                 ->paginate(20);

        
        $data = [
            'user' => $user,
            'shops' => $shops,
            'count_favorite' => $count_favorite,
            
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

        return [
            'count_shops' => $count_shops,
            'count_favoriteings' => $count_favoriteings,
        ];
    }
}