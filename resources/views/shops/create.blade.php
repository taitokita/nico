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
                          <p class="shadow text2">Nico</p>
                          <p class="script"><span>by TK kingdom</span></p>
                        </div>
                    </div>
              </div>
          </div>
         
          <div id="form-main">
           <div id="form-div">
             <form class="form" id="form1">
              {!! Form::model($shop, ['route' => 'shops.store', 'files' => 'true', 'enctype'=>'multipart/form-data']) !!}
               
              <br>
                 <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"name="name" placeholder="Shopname" id="name" />
              <br>
              <br> 
              <p class="text">
                 <textarea name="content" class="validate[required,length[6,300]] feedback-input" id="comment"  placeholder="Content"></textarea>
              </p>
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
               <br>
            
               <form action="./filesend.cgi" method="post" enctype="multipart/form-data">
                 <label style="width:100%;">
                   <span class="filelabel" title="Photo select">
                     <img src="http://icooon-mono.com/i/icon_16250/icon_162500_256.png" width="30" height="30" >
                     &nbsp;Photo
                   </span>
                 <input type="file" name="photo[]" id="filesend" multiple="multiple">
                 </label>
               </form>
               
               
               <div class="submit">
                 <input type="submit" value="Post" id="button-black"/>
                 
                 <div class="ease"></div>
               </div>
             </form>
           </div>
           </div>
　{!! Form::close() !!}
　      
          
@endsection
            			
