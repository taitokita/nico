@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                    {!! Form::model($shop, ['route' => 'shops.store', 'enctype'=>'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Bijo名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Bijo名を入力', 'size' => 40]) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', 'コメント:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control input-lg', 'placeholder' => 'profileを入力', 'size' => 40]) !!}
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