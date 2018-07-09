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
            <p>カテゴリー：{{ $shop->tag_id}}</p>
            <p>コメント：{{ $shop->content }}</p>
            <p>投稿日時：{{ $shop->created_at}}</p>
    </div>
  
    
    <div>
            {!! link_to_route('shops.edit', 'このShopを編集', ['id' => $shop->id], ['class' => 'btn btn-default']) !!}
        
        　　{!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
            @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])

    </div>

</body>
@endsection

