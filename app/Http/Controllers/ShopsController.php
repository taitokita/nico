<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shop; 
use App\Tag;
use App\Review;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ShopsController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $reviews = Review::all();
        $tags = Tag::All();
        $tagLabel = '';
        $searchResultWithShop = array();
        
        
        foreach ($tags as $tag){
            foreach ($shops as $shop){
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
                }
            }
        }
        if($_GET['maction']??"" == "search"){
            //
            
        
            $ret = Shop::where('name', 'LIKE',"%".$_GET['name']."%")->get();
            // var_dump($ret);
            //return
            if($ret != null) {
                $searchResultWithShop =$ret;
            }
            foreach($ret as $r) {
                //echo $r->name;
            }
//            return;
            
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
            //'shops' => $shops,
            'shops' => $searchResultWithShop,
            //'reviews' => $reviews,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
            'name' => "",
            'search_result' =>  $searchResultWithShop,
            $data ]);


        }
        else {
            return view('welcome', [
            'shops' => $shops,
            //'reviews' => $reviews,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
        ]);
        
        
        //値を取得
        $name = Input::get('name');
        $tag = Input::get('tag');

        //query
        $query = Shop::query();

        //もしnameがあれば
        if(!empty($name)){
            $query->where('name','like','%'.$name.'%');
        }

        //もしemailがあれば
        if(!empty($tag)){
            $query->where('content','like','%'.$tag.'%');
        }

        //paginate
        $shops = $query->paginate(10);

        //値を返す
        //name,emailを返す
        return view('list')->with('shops',$shops)->with('name',$name)->with('tag',$tag);
    }
    }  
        

    public function create()
    {   
       
        $shop = new Shop;
        //$review = new Review;
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
        

        return redirect('/');

    }

    public function show($id)
    {   
        $shop = Shop::find($id);
        $reviews = Review::orderBy('created_at', 'desc')->where('shop_id', $id)->paginate(100);
        // select * from reviews where shop_id == $id orderby create_ad desc limit 100 offset 0
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
            'reviews' => $reviews,
            'user' => $user,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
           
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
}