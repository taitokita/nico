<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shop; 
use App\Tag;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ShopsController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $tags = Tag::All();
        $tagLabel = '';
        foreach ($tags as $tag){
            foreach ($shops as $shop){
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
                }
            }
        }
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

           // $shops = $user->shops()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'shops' => $shops,
            ];
            //$data += $this->counts($user);

            return view('shops.index', [
            'shops' => $shops,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
            $data ]);


        }
        else {
            return view('welcome', [
            'shops' => $shops,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
        ]);
    }
    }  
        

    public function create()
    {   
       
        $shop = new Shop;
        $tags = Tag::All();
        $tagLabel = '';
        foreach ($tags as $tag) {
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
            }

        return view('shops.create', [
            'shop' => $shop,
            'tags' => $tags
        ]);
    }
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            
            'name' => 'required|max:20', 
            'content' => 'required|max:191',
            'tag_id' => 'required',

        ]);

//        $filepath = $request->file('image')->store('public/items/photos');
        $filepath = $request->file('photo')->store('photo');
        $shop = new Shop;
        $shop->name = $request->name;
        $shop->content = $request->content;
        $shop->user_id = \Auth::user()->id;
        $shop->tag_id = Input::get('tag_id');
        $shop->path = $filepath; 
        $shop->save();
        

        return redirect('shops');

    }

    public function show($id)
    {   
        $shop = Shop::find($id);
        $user = \Auth::user();
        $tags = Tag::All();
        $tagLabel = '';
        foreach ($tags as $tag) {
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
            }
        }
        return view('shops.show', [
            'shop' => $shop,
            'user' => $user,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel
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
            'name' => 'required|max:20', 
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

    // public function tagings($id)
    // {
    //     $shop = Shop::find($id);
    //     $tagings = $shop->tagings()->paginate(10);

    //     $data = [
    //         'shop' => $shop,
    //         'shops' => $tagings,
    //     ];

    //     $data += $this->counts($shop);

    //     return view('shops.tagings', $data);
    // }

}