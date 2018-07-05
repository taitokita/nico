@if (Auth::user()->is_favoriteing($shop->id))
        {!! Form::open(['route' => ['user.unfavorite', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['user.favorite', $user->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
@endif