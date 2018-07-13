<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Shop;
use App\Tag;
use App\Review;

class RankingController extends Controller
{
    public function favorite()
    {
        $shops = \DB::table('user_favorite')
        ->join('shops', 'user_favorite.favorite_id', '=', 'shops.id')
        ->select (min('path','name','favorite_id')
            , \DB::raw('min(path) as path')
            , \DB::raw('min(name) as name')
            , \DB::raw('min(favorite_id) as favorite_id')
            , \DB::raw('shops.id as id')
            , \DB::raw('COUNT(*) as count'))
        ->groupBy('shops.id','user_favorite.favorite_id')
        ->orderBy('count', 'DESC')->take(50)->get();
        $old = 0;
        $rank = 0;
    
        return view('ranking.favorite', [
            'shops' => $shops,
            'old' => $old,
            'rank' => $rank
        ]);
    }
    
    public function review()
    {
        
        $shops = \DB::table('reviews')
        ->join('shops', 'reviews.shop_id', '=', 'shops.id')
        ->select (min('path','name','shop_id')
            , \DB::raw('min(path) as path')
            , \DB::raw('min(name) as name')
            , \DB::raw('min(shop_id) as shop_id')
            , \DB::raw('shops.id as id')
            , \DB::raw('COUNT(*) as count'))
        ->groupBy('shops.id','reviews.shop_id','shops.name')
        ->orderBy('count', 'DESC')->take(50)->get();
        
        $old = 0;
        $rank = 0;

        return view('ranking.review', [
            'shops' => $shops,
            'old' => $old,
            'rank' => $rank,
        ]);

    }
    
}
