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
       @if(empty($shop->path))
       <p><img id=imageshow src="{{asset('item/photo/dummy.jpg') }}"></p>
       @else
       
       @endif
       @foreach($images as $image)
       <div style='display:inline-block;'><img id=imageshow src="{{asset('item/'.$image->url) }}"></div>
       @endforeach
   </div>
   
   <div class='showcontents'>
       <?php
       $tagLabel = '';
       foreach ($tags as $tag) {
           if($tag->id == $shop->tag_id) {
               $name = $tag->name;
               break;
           }
       }
       ?>
            <p>Name : {{ $shop->name }}</p>    
            <p>Category : {{ $name}}</p>
            <p>Coment : {{ $shop->content }}</p>
            <p>Location : </p>
            <p>Post time : {{ $shop->created_at}}</p>
    </div>
            
     @include('shops.favorite_button', ['shop' => $shop],['class' => 'btn'])
    
    
    <div class="form-group">
        {!! Form::open(['route' => 'reviews.store']) !!}
        {!! Form::hidden('shop_id', $shop->id) !!}
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
        @if (Auth::id() == $shop->user_id)
            {!! link_to_route('shops.edit', 'edit this page', ['id' => $shop->id], ['class' => 'btn btn-default']) !!}
        
        　　{!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                {!! Form::submit('delete this page', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    </div>
</body>
@endsection

