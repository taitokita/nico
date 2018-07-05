@if (Auth::user()->is_favoriteing($shop->id))
        {!! Form::open(['route' => ['user.unfavorite', $shop->id], 'method' => 'delete']) !!}
            {!! Form::submit('UnLike', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['user.favorite', $shop->id]]) !!}
            {!! Form::submit('Like', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
@endif
