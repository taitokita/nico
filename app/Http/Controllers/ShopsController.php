<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function create()
    {
         $shops = [];

        return view('shops.create',
        ['shops' => $shops,
            ]);
    }
}
