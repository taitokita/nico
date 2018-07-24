@extends('layouts.app')
    
    <div class="fadeSlider1">
        <span class="fadeSlider_01"></span>          
        <span class="fadeSlider_02"></span>
        <span class="fadeSlider_03"></span>
        <span class="fadeSlider_04"></span>          
        <span class="fadeSlider_05"></span>
        <span class="fadeSlider_06"></span>
        <span class="fadeSlider_07"></span>          
        
    </div>
        <div class="mainbody2">
@section('content')
    <div class="cover2">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>{{ $tag->name }} Index</h1>
                <div class="searchform" class="col-md-3 col-sm-4 col-xs-6">
                    <form method="get" action="{{route('shops.index')}}">
                        <div style="display:inline-block">
                       <input type="text" style="width:300px;height:31px ;" name="name" class="form-control" placeholder="keyword" class="search1">
                       <input type="hidden" name="maction" value="search">
                       </div>
                       <div style="display:inline-block">
                        <p>  <button class="btn btn-info btn-md">
                             <span class="glyphicon glyphicon-search"></span>  
                           </button>
                            </p>
                             </div>
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @if ($shops)
    <div class="row">
        @foreach ($shops as $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div id=images class="panel-heading text-center">
                            <img src="{{asset('item/'.$shop->path)}}">
                        </div>
                        
                        <div class="panel-body" id+"hoge" style="width:100%;">
                            <h3 class="shop-title" id+"hoge" width="100%">{!! link_to_route('shops.show', $shop->name, ['name' => $shop->id]) !!}</h>
                        <br>
                        <div id="bottonshop" class="shop-favorite" class="buttons text-center ">
                                @if (Auth::check())
                                    @include('shops.favorite_button', ['shop' => $shop])
                                @endif
                        </div>
                        </div>
                        
                        <?php
                            $tagLabel = '';
                            foreach ($tags as $tag) {
                                if($tag->id == $shop->tag_id) {
                                    $name = $tag->name;
                               
                            break;
                                }
                            }
                            ?>
                            
                            <div class="panel-footer">
                                <p class="text-center">{{$name}}</p>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach    
    </div>
@endif
@endsection
