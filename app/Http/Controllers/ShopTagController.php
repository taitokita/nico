<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopTagController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::shop()->tag($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::shop()->untag($id);
        return redirect()->back();
    }
}