<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shop; 
use App\Tag;
use App\Review;
use App\Image;

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
        
        if($_GET['maction'] == "search"){
            
            $tag->id = 11;
        
            $ret = Shop::where('name', 'LIKE',"%".$_GET['name']."%")->get();
            if($ret != null) {
                $searchResultWithShop =$ret;
            }
            foreach($ret as $r) {
            }
        }
        else{
              $tag = Tag::find($_GET['maction']??0);
            
              $japanese = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $japanese;

              $french = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $french;  

              $italian = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $italian;

              $chinese = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $chinese;

              $korean = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $korean;

              $spanish = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $spanish;

              $indian = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $indian;

              $ethnic = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $ethnic;

              $sakebar = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $sakebar;

              $cafe = Shop::where('tag_id', $_GET['maction'])->get();
                      $searchResultWithShop = $cafe;
      }
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $data = [
                'user' => $user,
                'shops' => $shops,
            ];

            return view('shops.index', [
            'shops' => $searchResultWithShop,
            'tags' =>$tags,
            'tagslabel' =>$tagLabel,
            'name' => "",
            'search_result' =>  $searchResultWithShop,
            'tag' =>$tag,
            $data ]);


        }
        else {
            return view('welcome', [
            'shops' => $shops,
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

        //もしtagがあれば
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
            
            'name' => 'required|max:50', 
            'content' => 'required|max:191',
            'tag_id' => 'required',

        ]);
        
       if($request->file('photo')!=null && count($request->file('photo'))>0){
            foreach((array)$request->file('photo') as $gyu){
              $filepath = $gyu->store('photo');
//              var_dump($gyu);
            }
  //          return;
       }
       else {
        $filepath ='';
        }
        
        $shop = new Shop;
        $shop->name = $request->name;
        $shop->content = $request->content;
        $shop->user_id = \Auth::user()->id;
        $shop->tag_id = Input::get('tag_id');
        $shop->path = $filepath; 
        $shop->save();
        
        if($request->file('photo')!=null && count($request->file('photo'))>0){
       foreach((array)$request->file('photo') as $gyu){
           $filepath = $gyu->store('photo');
           $i = new Image;
           $i->shops_id = $shop->id;
           $i->url  = $filepath;
           $i->save();
       }}
        

        return redirect('/');

    }

    public function show($id)
    {   
        $shop = Shop::find($id);
        $reviews = Review::orderBy('created_at', 'desc')->where('shop_id', $id)->paginate(100);
        $user = \Auth::user();
        $tags = Tag::All();
        $tagLabel = '';
        $images = Image::where('shops_id', $id)->get();
       
        foreach ($tags as $tag) {
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
            }
        }
        
        return view('shops.show', [
            'shop' => $shop,
            'images' =>  $images,
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
            'name' => 'required|max:50', 
            'content' => 'required|max:191',
            'tag_id' => 'required',
        ]);
        
        if($request->file('photo')!=null && count($request->file('photo'))>0){
            foreach((array)$request->file('photo') as $gyu){
              $filepath = $gyu->store('photo');
            }
       }
       else {
        $filepath ='';
        }
        

        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->content = $request->content;
        $shop->tag_id = Input::get('tag_id');
        $shop->path = $filepath; 
        $shop->save();
        
        if($request->file('photo')!=null && count($request->file('photo'))>0){
        foreach((array)$request->file('photo') as $gyu){
           $filepath = $gyu->store('photo');
           $i = new Image;
           $i->shops_id = $shop->id;
           $i->url  = $filepath;
           $i->save();
        }}
        
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



