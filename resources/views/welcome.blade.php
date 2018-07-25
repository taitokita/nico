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
                    <div class="hover-desc">
                        <div class="plate">
                          <p class="script"><span>u gonna</span></p>
                          <p class="shadow text2">Nico</p>
                          <p class="script"><span>by TK kingdom</span></p>
                        </div>
                        <div class="mask">
                             <div class="caption"><br>One cannot think well, <br><br>
                                                        love well, sleep well, <br><br>
                                                        if one has not dined well.
                             </div>
                        </div>
                    </div>
                    @if (!Auth::check())
                        {!! Form::open(['route' => ['login'], 'method' => 'get']) !!}
                                      <button class="button_login">Log in</button>
                        {!! Form::close() !!}
                       
                        {!! Form::open(['route' => ['signup.get'], 'method' => 'get']) !!}
                                      <button class="button_signup">Sign up</button>
                        {!! Form::close() !!}
                    @else
                    
                      <div class="searchform" class="col-md-3 col-sm-4 col-xs-6">
                            <form method="get" action="{{route('shops.index')}}">
                               <div style="display:inline-block">
                                   <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
                                   <input type="text" style="width:280px;height:31px;" name="name" class="form-control" placeholder="keyword" class="search1">                            
                                   <input type="hidden" name="maction" value="search">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                               </div>
                               <div style="display:inline-block">
                                    <p>  
                                        <button class="btn btn-info btn-md height:35px">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </p> 
                                </div>
                            </form>
                        </div> 
                    @endif
                    
                </div>
            </div>
            @include('shops.shops', ['shops' => $shops])
        </div>
       </div> 
    <div class="paginate" style="text-align:center;">
        {{ $shops->links() }}
    </div>
    
@endsection
