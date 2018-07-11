<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_favoriteings = $user->favoriteings()->count();
        $count_shops = $user->shops()->count();
        $count_reviews = $user->reviews()->count();

        return [
            'count_favoriteings' => $count_favoriteings,
            'count_shops' => $count_shops,
            'count_reviews' => $count_reviews,
            
        ];
    }
}