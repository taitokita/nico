@if (Auth::user()->is_favoriteing($shop->code))
    {!! Form::open(['route' => 'shop_user.dont_favorite', 'method' => 'delete']) !!}
        {!! Form::hidden('shopCode', $shop->code) !!}
        {!! Form::submit('Favorite', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'shop_user.favorite']) !!}
        {!! Form::hidden('shopCode', $shop->code) !!}
        {!! Form::submit('Favorite it', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endif