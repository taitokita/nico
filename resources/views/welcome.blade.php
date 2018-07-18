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
        <div class="cover">
            <div class="cover-inner">
                <div class="cover-contents">
                    <h1>Nico</h1>
                    <h2>Design, the Time after work.</h2>
                    @if (!Auth::check())
                        <a href="{{ route('signup.get') }}" class="btn btn-default btn-lg">Sign up</a>
                        <a href="{{ route('login') }}"class="btn btn-default btn-lg">Log in</a>
                    @else
                      <div class="searchform" class="col-md-3 col-sm-4 col-xs-6">
                           <form method="get" action="{{route('shops.index')}}">
                                <input type="text" name="name" class="form-control" placeholder="keyword" class="search1">                            
                                <input type="hidden" name="maction" value="search">
                                <input type="submit" value="Search" class="btn btn-secondary">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                        </div> 
                    @endif
                </div>
            </div>
            @include('shops.shops', ['shops' => $shops])
        </div>
@endsection
