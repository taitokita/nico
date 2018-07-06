<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shop; 

use App\Review;

class ShopsController extends Controller
{
    public function index()
    {
        $shops = Shop::all(); 
        $reviews = Review::all(); 
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

           // $shops = $user->shops()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'shops' => $shops,
                'reviews' => $reviews,
            ];
            //$data += $this->counts($user);

            return view('shops.index', [
            'shops' => $shops,
            'reviews' =>$reviews,
            $data ]);


        }else {
            return view('welcome', [
            'shops' => $shops,
        ]);
    }
        
        
    }

    public function create()
    {   
       
        $shop = new Shop;
       
       
        return view('shops.create', [
            'shop' => $shop,
        ]);
    }

    public function store(Request $request)
    {
               
       $this->validate($request, [
            
            'name' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);

//        $filepath = $request->file('image')->store('public/items/photos');
        $filepath = $request->file('photo')->store('photo');
        $shop = new Shop;
        $shop->name = $request->name;
        $shop->content = $request->content;
        $shop->user_id = \Auth::user()->id;
        $shop->path = $filepath; 
        //$shop->type = 'like';
        //$shop->id =  $like['Shop']['shopId'];
        $shop->save();
        
        // $table->increments('id');
        //     $table->timestamps();
        //     $table->string('name');
        //     $table->string('content');
        //     $table->string('master');
        //     $table->string('path');
        //     //$table->string('id');
        //     $table->string('name');
        //     $table->string('type')->index();
        //     $table->integer('user_id')->unsigned()->index();
        
//        $request->user()->shop()->create([
 //           'content' => $request->content,
  //      ]);


        return redirect('shops');

    }

    public function show($id)
    {   
        $shop = Shop::find($id);
        $user = \Auth::user();
        $review = Review::find($id);
        //$like_users = $shop->like_users;

        return view('shops.show', [
            'shop' => $shop,
            'user' => $user,
            'review' => $review,
        ]);
        
    }

    public function edit($id)
    {
        $shop = Shop::find($id);

        return view('shops.edit', [
            'shop' => $shop,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);
        

        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->content = $request->content;
        $shop->save();
        
        return redirect('/');

    }

    public function destroy($id)
    {
        $shop = \App\Shop::find($id);

        if (\Auth::user()->id === $shop->user_id) {
            $shop->delete();
        }
        return redirect('/');
    }

}