@extends('layouts.app')

@section('content')
    <div class="cover10">
        <div class="cover-inner">
            <div class="cover-contents">
               <h1>Favoriteランキング</h1>
        </div>
    </div>
</div>
    @include('shops.shops', ['shops' => $shops])
@endsection