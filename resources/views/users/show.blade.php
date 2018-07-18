@extends('layouts.app')
    
    <div class="fadeSlider2">
        <span class="fadeSlider_08"></span>
        <span class="fadeSlider_09"></span>
        <span class="fadeSlider_10"></span>          
        <span class="fadeSlider_11"></span>
        <span class="fadeSlider_12"></span>
        <span class="fadeSlider_13"></span>
        <span class="fadeSlider_14"></span>
    </div>
        <div class="mainbody2">
@section('content')
<div class="cover6">
    <div class="cover-inner">
        <div class="cover-contents">
            <h1>{{ $user->name }}'s profile</h1>
        </div>
    </div>
</div>
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->password, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <body>
        <div class="status text-center">
            <ul>
                
                <li>
                    <div class="status-label">favorite</div>
                    <div class="post_count" class="status-value">
                        {{ $count_favoriteings }}
                    </div>
                </li>
                 <li>
                    <div class="status-label">review</div>
                    <div class="post_count" class="status-value">
                        {{ $count_reviews }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
<div class="hidden_box">
    <label for="label1" class="glyphicon glyphicon-circle-arrow-down"> favorite</label>
    <input type="checkbox" id="label1"/>
    <div class="hidden_show">
      <!--非表示ここから-->     
      	@include('shops.shops',['shops' => $shops])
        {!! $shops->render() !!}
      <!--ここまで-->
    </div>
</div>
<div class="hidden_box">
    <label for="label2" class="glyphicon glyphicon-circle-arrow-down"> review</label>
    <input type="checkbox" id="label2"/>
    <div class="hidden_show">
      <!--非表示ここから-->     
      	@include('shops.shops1',['shops' => $shops1])
        {!! $shops->render() !!}
      <!--ここまで-->
    </div>
</div>
@endsection
