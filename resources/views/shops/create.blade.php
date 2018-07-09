@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                    {!! Form::model($shop, ['route' => 'shops.store', 'enctype'=>'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Shop名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Bijo名を入力', 'size' => 40]) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', 'content:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control input-lg', 'placeholder' => 'profileを入力', 'size' => 40]) !!}
                </div>
                
                <div class="form-group">
            		<label for="tag_id" class="">カテゴリー</label>
            		<div class="">
            			<select name="tag_id" type="text" class="">
            				<option></option>
            				<option value="1" name="イタリアン">イタリアン</option>
            				<option value="2" name="フレンチ">フレンチ</option>
            			</select>
            		</div>
            	</div>

                
                <div class="form-group">
                    <label for="photo">画像ファイル:</label>
                    {!! Form::file('photo') !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary lg']) !!}
        
            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection