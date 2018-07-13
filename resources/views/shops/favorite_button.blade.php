@if (Auth::user()->is_favoriteing($shop->id))
        {!! Form::open(['route' => ['user.unfavorite', $shop->id], 'method' => 'delete']) !!}
            {!! Form::submit('この店舗をUnLikeする', ['class' => "btn btn-warning"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['user.favorite', $shop->id]]) !!}
            {!! Form::submit('この店舗をLikeする', ['class' => "btn btn-success"]) !!}
        {!! Form::close() !!}
@endif