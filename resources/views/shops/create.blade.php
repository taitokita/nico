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
    <div class="cover3">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Shop posting page</h1>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="row">
            <div class="text-center">
                    {!! Form::model($shop, ['route' => 'shops.store', 'enctype'=>'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Shop name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Shop name', 'size' => 40]) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', 'content:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input coment', 'size' => 40]) !!}
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
                
                {!! Form::submit('Post', ['class' => 'btn btn-primary lg']) !!}
        
            　　{!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection