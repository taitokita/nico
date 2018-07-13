@extends('layouts.app')

@section('content')
    <div class="cover11">
        <div class="cover-inner">
            <div class="cover-contents">
               <h1>Reviewランキング</h1>
        </div>
    </div>
</div>
    @include('shops.shops', ['shops' => $shops])
@endsection