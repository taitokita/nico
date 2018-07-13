@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Nico</h1>
                <h1>終業後の時間をデザインする</h1>
                @if (!Auth::check())
                    <a href="{{ route('signup.get') }}" class="btn btn-info btn-lg">Sign up</a>
                    <a href="{{ route('login') }}"class="btn btn-success btn-lg">Log in</a>
                @else
                    <a href="{{ route('shops.create') }}" class="btn btn-primary btn-lg">店舗を投稿する</a>
                    <a href="{{ route('shops.index') }}" class="btn btn-success btn-lg">検索する</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
   @include('shops.shops', ['shops' => $shops])
@endsection