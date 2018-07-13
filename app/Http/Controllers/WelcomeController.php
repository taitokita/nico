<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Shop;
use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {
        $shops = Shop::orderBy('updated_at', 'desc')->paginate(20);
        $tags = Tag::All();
        
        return view('welcome', [
            'shops' => $shops,
            'tags' => $tags
        ]);
    }
}
