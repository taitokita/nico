<link rel="stylesheet" href="<link rel="stylesheet"">
@extends('layouts.app')

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
        <p><img id=imageshow src="{{asset('item/'.$shop->path) }}"></p>
        
    </div>
    <div id=balloon-5-top-left>
        <?php
        $tagLabel = '';
        foreach ($tags as $tag) {
            if($tag->id == $shop->tag_id) {
                $name = $tag->name;
                break;
            }
        }
        ?>
            <p>カテゴリー：{{ $name}}</p>
            <p>コメント：{{ $shop->content }}</p>
            <p>投稿日時：{{ $shop->created_at}}</p>
    </div>
            
     @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])
    
    
    <div class="form-group">
        {!! Form::open(['route' => 'reviews.store']) !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    <div>
        @if (count($reviews) > 0)
                    @include('reviews.reviews', ['reviews' => $reviews])
        @endif
    </div>    
    
    <div>
            {!! link_to_route('shops.edit', 'この店舗を編集', ['id' => $shop->id], ['class' => 'btn btn-default']) !!}
        
        　　{!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
    </div>

</body>
@endsection

