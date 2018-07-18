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
    <div class="cover4">
        <div class="cover-inner">
            <div class="cover-contents">
                 <h1>Edit {{ $shop->name }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($shop, ['route' => ['shops.update', $shop->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Shop name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content', 'content') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
            		<label for="tag_id" class="">Category</label>
            		<div class="">
            			<select name="tag_id" type="text" class="">
            				<option></option>
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
            		</div>
            	</div>
                
                <div class="form-group">
                    <label for="photo">Picture file:</label>
                    {!! Form::file('photo[]', ["multiple"]) !!}
                </div>
                
                
                {!! Form::submit('update', ['class' => 'btn btn-default']) !!}
                
    
            {!! Form::close() !!}
        </div>
    </div>
    

@endsection
