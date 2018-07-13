@extends('layouts.app')

@section('content')
    <div class="cover3">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>店舗の投稿ページ</h1>
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
            		<label for="tag_id" class="">カテゴリー</label>
            		<div class="">
            			<select name="tag_id" type="text" class="">
            				<option></option>
            				<option value="1" name="1">和食</option>
            				<option value="2" name="2">フレンチ</option>
            				<option value="3" name="3">イタリアン</option>
            				<option value="4" name="4">チャイニーズ</option>
            				<option value="5" name="5">コリアン</option>
            				<option value="6" name="6">スパニッシュ</option>
            				<option value="7" name="7">インド</option>
            				<option value="8" name="8">エスニック</option>
            				<option value="9" name="9">居酒屋・Bar</option>
            				<option value="10" name="10">Café</option>
            			</select>
            		</div>
            	</div>

                
                <div class="form-group">
                    <label for="photo">画像ファイル:</label>
                    {!! Form::file('photo[]', ["multiple"]) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary lg']) !!}
        
            　　{!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection