<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Shop;

class WelcomeController extends Controller
{
    public function index()
    {
        $shops = Shop::orderBy('updated_at', 'desc')->paginate(20);
        return view('welcome', [
            'shops' => $shops,
        ]);
    }
}
