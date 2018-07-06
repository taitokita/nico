@extends('layouts.app')

@section('content')
    <h1>Favoriteランキング</h1>
    @include('shops.shops', ['shops' => $shops])
@endsection