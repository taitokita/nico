@if (Auth::user()->is_favoriteing($shop->id))
       {!! Form::open(['route' => ['user.unfavorite', $shop->id], 'method' => 'delete']) !!}
           
           <button class="button_unlike">Unlike this shop</button>
       {!! Form::close() !!}
@else
       {!! Form::open(['route' => ['user.favorite', $shop->id]]) !!}
           
           <button class="button">Like this shop</button>
       {!! Form::close() !!}
@endif