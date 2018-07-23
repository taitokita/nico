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
                    <div class="cover-contents">
                        <div class="plate">
                          <p class="script"><span>u gonna</span></p>
                          <p class="shadow text2">Nico</p>
                          <p class="script"><span>by TK kingdom</span></p>
                        </div>
                    @if (!Auth::check())
                        <a href="{{ route('signup.get') }}" class="btn btn-default btn-lg">Sign up</a>
                        <a href="{{ route('login') }}"class="btn btn-default btn-lg">Log in</a>
                    @else
                      <div class="searchform" class="col-md-3 col-sm-4 col-xs-6">
                            <form method="get" action="{{route('shops.index')}}">
                               <div style="display:inline-block">
                               <input type="text" style="width:100%;height:auto;" name="name" class="form-control" placeholder="keyword" class="search1">                            
                               <input type="hidden" name="maction" value="search">
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                               </div>
                               <div style="display:inline-block">
                                    <p>  
                                        <button class="btn btn-info btn-md">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </p> 
                                </div>
                            </form>
                        </div> 
                    @endif
                    </div>
                </div>
            </div>
            @include('shops.shops', ['shops' => $shops])
        </div>
@endsection
