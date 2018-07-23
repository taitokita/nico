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
                    
                        <div class="plate">
                          <p class="script"><span>u gonna</span></p>
                          <p class="shadow text2">Create</p>
                          <p class="script"><span>Nico by TK kingdom</span></p>
                        </div>
                    </div>
              </div>
          </div>
          
         {!! Form::model($shop, ['route' => 'shops.store', 'files' => 'true', 'enctype'=>'multipart/form-data']) !!}
          <div id="form-main">
           <div id="form-div">
               <form class="form" id="form1">
                   <br>
                 <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"name="name" placeholder="Shopname" id="name" />
              <br>
              <br>
              <p class="text">
                 <textarea name="content" class="validate[required,length[6,300]] feedback-input" id="comment"  placeholder="Detail of the Shop"></textarea>
              </p>

               <select  name="tag_id" type="text" class="form-control selectpicker"style="font-size: 18px" >
             
                                     <option class="content" data-icon="glyphicon-tag">&nbsp;&nbsp;Category</option>
                                     <option value="1" name="1">Japanese</option>
                      				<option value="2" name="2">French</option>
                      				<option value="3" name="3">italian</option>
                      				<option value="4" name="4">Chinese</option>
                      				<option value="5" name="5">Korean</option>
                      				<option value="6" name="6">Spanish</option>
                      				<option value="7" name="7">Indian</option>
                      				<option value="8" name="8">Ethnic</option>
                      				<option value="9" name="9">Izakaya・Bar</option>
                      				<option value="10" name="10">Café</option>
               </select>
               <br>
               <br>
            
               <form action="./filesend.cgi" method="post" enctype="multipart/form-data">
                  <p>
                     <label style="width:100%;">
                         
                        <span class="filelabel" >
                           <img src="http://icooon-mono.com/i/icon_16250/icon_162500_256.png" width="30" height="30" >&nbsp;&nbsp;Photo
                           <span id="selectednum"></span>
                        </span>
                        <input type="file" name="photo[]" id="filesend" multiple=",multiple" multiple accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png" class="file">
                        <span id="previewbox"></span>
                     </label>
                     <span id="previewbox"></span>
                     
                  </p>
                </form>
               
               <br>
               <br>
               
               <div class="submit">
                 <input type="submit" value="Post" id="button-black"/>
                 
                 <div class="ease"></div>
               </div>
             </form>
           </div>
           </div>
{!! Form::close() !!}
　      
　      
　      <style type="text/css">
          .bootstrap-select {
           display: block;
           width: 100%;
           height:55px;
           }
          
          .glyphicon.glyphicon-tag{
          font-size:30px;
          }
          
          .btn {
           height:55px;
           margin-top: 0px;
          }
        </style>
        
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
            			
