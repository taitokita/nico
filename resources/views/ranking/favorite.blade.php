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
    <div class="cover10">
        <div class="cover-inner">
            <div class="cover-contents">
               <h1>Favorite Ranking</h1>
        </div>
    </div>
</div>
    @include('shops.shops', ['shops' => $shops])
    
    <div class="paginate">
            {{ $shops->links() }}
    </div>
        
@endsection