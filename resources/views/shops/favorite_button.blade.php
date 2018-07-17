@if (Auth::user()->is_favoriteing($shop->id))
        {!! Form::open(['route' => ['user.unfavorite', $shop->id], 'method' => 'delete']) !!}
            {!! Form::submit('UnLike this shop', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['user.favorite', $shop->id]]) !!}
            {!! Form::submit('Like this shop', ['class' => "btn btn-success"]) !!}
        {!! Form::close() !!}
@endif