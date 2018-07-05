@extends('layouts.app')

@section('content')
    <div class="cover2">
        <div class="cover-inner">
            <div class="cover-contents">
                 <h1>Bijo Clock</h1>
            </div>
        </div>
    </div>
    @if (count($shops) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Bijos name</th>
                    <th>content</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                    <tr class = table2>
                        <td>{!! link_to_route('shops.show', $shop->id, ['id' => $shop->id]) !!}</td>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {!! link_to_route('shops.create', '出会いに行く', null, ['class' => 'btn btn-primary']) !!}
@endsection
