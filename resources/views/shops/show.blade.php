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
     
      <div id="carousel-example" class="carousel slide" data-ride="carousel" data-inteerval="7000">
                  

                  <!-- スライドの内容 -->
                  <div class="carousel-inner">
            

                    @foreach($images as $k => $image)
                    <?php
                    
                    if($k == 0) {
                       $opt = "active"; 
                    } else {
                       $opt = ""; 
                    }
                    ?>
                    <div class="item {{$opt}}">
                      <img src="{{asset('item/'.$image->url)}}" alt="">
                    </div>
                    @endforeach
                    
                  </div>

                  <!-- 左右の移動ボタン -->
                  <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  </a>
                </div>



     
  
 
     <br>
   
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
   @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])
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
          
          
          <div class="hidden_box_shop">
              <label>FAVORITES</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop_favorites"> : {{ $count_favoriteings}} fovorites</div>
                  </div>
              </div>
         
          
          <br>
          
          <div class="hidden_box_shop2">
              <label>COMMENT</label>
                  <div class="hidden_show">
                   <div class="hidden_box_shop2_content"> : {{ $shop->content }}</p>
                  </div>
              </div>
          </div>  
      </div> 
            <br>
            <br>
    
    <div class="form-group">
       {!! Form::model($shop, ['route' => ['shops.update', $shop->id], 'method' => 'put','files' => 'true', 'enctype'=>'multipart/form-data']) !!}
       
       <input name="name"  type="hidden" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"name="name" placeholder="Shopname" id="name" value="{{$shop->name}}"/>
       <input name="content" type="hidden" class="validate[required,length[6,300]] feedback-input" id="comment"  placeholder="Content" value="{{$shop->content}}"/>
       <input  name="tag_id" type="hidden" class="form-control selectpicker"style="font-size: 18px" value="{{$shop->tag_id}}"/>
       
           <form action="./filesend.cgi" method="post" enctype="multipart/form-data">
             <div class="add_photo">
                 <label class="filelabel2">
                    <span class="addicons">
                       <img src="http://icooon-mono.com/i/icon_16250/icon_162500_256.png" width="30" height="30" >&nbsp;&nbsp;&nbsp;Add Photo
                       <span id="selectednum"></span>
                    </span>
                    <input type="file" name="photo[]" id="filesend" multiple=",multiple" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png" class="file">
                    
                 </label>
                 
             
            
            <div class="submit_add">     
              <div class="submit">
                      <input type="submit" value="Post" id="button-add"/>
              </div>
            </div>
        </div>
      {!! Form::close() !!}
      <span id="previewbox"></span>
    </div>
  

        <div></div>
            
             <br><br>
             
             
             
        
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






<script type="text/javascript">
document.getElementById("filesend").addEventListener('change', function(e) {
  var files = e.target.files;
  previewUserFiles(files);
});
// ▼②選択画像をプレビュー
function previewUserFiles(files) {
  // 一旦リセットする
  resetPreview();
  // 選択中のファイル1つ1つを対象に処理する
  for (var i = 0; i < files.length; i++) {
     // i番目のファイル情報を得る
     var file = files[i];
     // 選択中のファイルが画像かどうかを判断
     if( file.type.indexOf("image") < 0 ) {
        /* 画像以外なら無視 */
        continue;
     }
     // ファイル選択ボタンのラベルに選択個数を表示
     document.getElementById("selectednum").innerHTML = (i+1) + " selected";
     // 画像プレビュー用のimg要素を動的に生成する
     var img = document.createElement("img");
     img.classList.add("previewImage");
     img.file = file;
     img.height = 100;   // プレビュー画像の高さ
     // 生成したimg要素を、プレビュー領域の要素に追加する
     document.getElementById('previewbox').appendChild(img);
     // 画像をFileReaderで非同期に読み込み、先のimg要素に紐付けする
     var reader = new FileReader();
     reader.onload = (function(tImg) { return function(e) { tImg.src = e.target.result; }; })(img);
     reader.readAsDataURL(file);
  }
}
// ▼③プレビュー領域をリセット
function resetPreview() {
  // プレビュー領域に含まれる要素のすべての子要素を削除する
  var element = document.getElementById("previewbox");
  while (element.firstChild) {
     element.removeChild(element.firstChild);
  }
  // ファイル選択ボタンのラベルをデフォルト状態に戻す
  document.getElementById("selectednum").innerHTML = "No file";
}
</script>

<script type="text/javascript">
            document.getElementById("filesend").addEventListener('change', function(e) {
              var files = e.target.files;
              previewUserFiles(files);
            });
            // ▼②選択画像をプレビュー
            function previewUserFiles(files) {
              // 一旦リセットする
              resetPreview();
              // 選択中のファイル1つ1つを対象に処理する
              for (var i = 0; i < files.length; i++) {
                 // i番目のファイル情報を得る
                 var file = files[i];
                 // 選択中のファイルが画像かどうかを判断
                 if( file.type.indexOf("image") < 0 ) {
                    /* 画像以外なら無視 */
                    continue;
                 }
                 // ファイル選択ボタンのラベルに選択個数を表示
                 document.getElementById("selectednum").innerHTML = (i+1) + " selected";
                 // 画像プレビュー用のimg要素を動的に生成する
                 var img = document.createElement("img");
                 img.classList.add("previewImage");
                 img.file = file;
                 img.height = 100;   // プレビュー画像の高さ
                 // 生成したimg要素を、プレビュー領域の要素に追加する
                 document.getElementById('previewbox').appendChild(img);
                 // 画像をFileReaderで非同期に読み込み、先のimg要素に紐付けする
                 var reader = new FileReader();
                 reader.onload = (function(tImg) { return function(e) { tImg.src = e.target.result; }; })(img);
                 reader.readAsDataURL(file);
              }
            }
            // ▼③プレビュー領域をリセット
            function resetPreview() {
              // プレビュー領域に含まれる要素のすべての子要素を削除する
              var element = document.getElementById("previewbox");
              while (element.firstChild) {
                 element.removeChild(element.firstChild);
              }
              // ファイル選択ボタンのラベルをデフォルト状態に戻す
              document.getElementById("selectednum").innerHTML = "No file";
            }
        </script>






@endsection

