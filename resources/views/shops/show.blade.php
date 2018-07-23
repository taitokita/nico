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
<?php
       $tagLabel = '';
       foreach ($tags as $tag) {
           if($tag->id == $shop->tag_id) {
               $name = $tag->name;
               break;
           }
       }
       ?>
    <div class="cover1">
        <div class="cover-inner">
            <div class="sandbox sandbox-correct-pronounciation">
              <h1 class="heading heading-correct-pronounciation">
                The
                <em>{{ $shop->name }}</em>
               {{ $name}} style
              </h1>
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
 
   
   <div class="form-group">
                  @if (Auth::id() == $shop->user_id)
                              {!! Form::open(['route' => ['shops.edit', $shop->id], 'method' => 'get']) !!}
                                  <button class="button_edit">Edit this shop</button>
                              {!! Form::close() !!}
                         
                          {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                              <div class="submit">
                                  <div id="submit_delete">
                                      <input type="submit" value="Delete this page" id="button_delete_shop"/>
                                  </div>
                              </div>
                          {!! Form::close() !!}
                  @endif
   </div>
   <br>
   <br>
   <div class='showcontents'>
            <div class="hidden_box_shop">
              <label>NAME</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_name"> : {{ $shop->name }}</div>
                  </div>
              </div>  

          <div class="hidden_box_shop">
              <label>CATEGORY</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_category"> : {{ $name}}</div>
                  </div>
              </div>  

         <div class="hidden_box_shop">
              <label>LOCATION</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_location"> : FUTAKOTAMAGAWA</div>
                  </div>
              </div>  

          <div class="hidden_box_shop">
              <label>POST TIME</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_posttime"> : {{ $shop->created_at}}</div>
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
            
            <br>
            <br>
    @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])
            <br>
            
    {!! Form::model($shop, ['route' => ['shops.update', $shop->id], 'method' => 'put','files' => 'true', 'enctype'=>'multipart/form-data']) !!}
        <form action="./filesend.cgi" method="post" enctype="multipart/form-data">
              
                 <label class="addphoto">
                     
                    <span class="filelabel" >
                       <img src="http://icooon-mono.com/i/icon_16250/icon_162500_256.png" width="30" height="30" >&nbsp;&nbsp;Add Photo
                       <span id="selectednum"></span>
                    </span>
                    <input type="file" name="photo[]" id="filesend" multiple=",multiple" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png" class="file">
                    <span id="previewbox"></span>
                 </label>
                 <span id="previewbox"></span>
                 
              
            </form>
            <div class="submit-1">
               <input type="submit" value="Post" id="button-add"/>
               <div class="ease-1"></div>
             </div>
             
 
{!! Form::close() !!}

            <br>
        
  <div class="form-group">
      {!! Form::open(['route' => 'reviews.store']) !!}
      {!! Form::hidden('shop_id', $shop->id) !!}
             <div class="comment_text">
               <p class="text">
                 <textarea name="content" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Review Comment"></textarea>
               </p>
             </div>
        <div class="submit_comment">     
          <div class="submit">
                  <input type="submit" value="Post" id="button-blue"/>
          </div>
        </div>
      {!! Form::close() !!}
  </div>
  
    <div>
        @if (count($reviews) > 0)
                    @include('reviews.reviews', ['reviews' => $reviews])
        @endif
    </div>
      

  </div>

</body>
@endsection

