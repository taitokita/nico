<link rel="stylesheet" href="<link rel="stylesheet"">
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
    <div class="cover1">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>{{ $shop->name }}'s page</h1>
            </div>
        </div>
    </div>
<body>
     <div class=imageshowflame>
       @if(empty($shop->path))
       
       @else
       
       @endif
       @foreach($images as $image)
       <div style='display:inline-block;'><img class=imageshow src="{{asset('item/'.$image->url) }}"></div>
       @endforeach
   </div>
   
   <div class='showcontents'>
       <?php
       $tagLabel = '';
       foreach ($tags as $tag) {
           if($tag->id == $shop->tag_id) {
               $name = $tag->name;
               break;
           }
       }
       ?>
            <div class="hidden_box_shop">
              <label>NAME</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_name"> : {{ $shop->name }}</p>
                      </div>
                  </div>
              </div>  

          <div class="hidden_box_shop">
              <label>CATEGORY</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_category"> : {{ $name}}</p>
                      </div>
                  </div>
              </div>  

         <div class="hidden_box_shop">
              <label>LOCATION</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_location"> : FUTAKOTAMAGAWA</p>
                      </div>
                  </div>
              </div>  

          <div class="hidden_box_shop">
              <label>POST TIME</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_posttime"> : {{ $shop->created_at}}</p>
                      </div>
                  </div>
              </div>      
          </div>
          
          <div class="hidden_box_shop">
              <label>COMMENT</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_content"> : {{ $shop->content }}</p>
                  </div>
              </div>
          </div>  
            
    @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])
    
    <div>
        @if (Auth::id() == $shop->user_id)
            {!! link_to_route('shops.edit', 'edit this page', ['id' => $shop->id], ['class' => 'btn btn-default']) !!}
        
        　　{!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                {!! Form::submit('delete this page', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    </div>
    
    <div class="form-group">
        {!! Form::open(['route' => 'reviews.store']) !!}
        {!! Form::hidden('shop_id', $shop->id) !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    <div>
        @if (count($reviews) > 0)
                    @include('reviews.reviews', ['reviews' => $reviews])
        @endif
    </div>    
    
</body>
@endsection

