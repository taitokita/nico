@extends('layouts.app')

@section('content')
<div class="cover6">
    <div class="cover-inner">
        <div class="cover-contents">
            <h1>{{ $user->name }}'s profile page</h1>
        </div>
    </div>
</div>
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->password, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <body>
        <div class="status text-center">
            <ul>
                
                <li>
                    <div class="status-label">LIKE</div>
                    <div id="post_count" class="status-value">
                        {{ $count_favoriteings }}
                    </div>
                </li>
                <li>
                    <div class="status-label">POST</div>
                    <div id="favorite_count" class="status-value">
                        {{ $count_favorite }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
    @include('shops.shops',['shops' => $shops])
    {!! $shops->render() !!}
@endsection

