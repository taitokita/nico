@extends('layouts.app')

@section('content')
    <div class="cover2">
        <div class="cover-inner">
            <div class="cover-contents">
                 <h1>Nico<h1>
            </div>
        </div>
    </div>
    @if (count($shops) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tag</th>
                    <th>Shops name</th>
                    <th>content</th>
                    <th>post time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                    <tr class = table2>
                        <td>{!! link_to_route('shops.show', $shop->id, ['id' => $shop->id]) !!}</td>
                            <?php
                            $tagLabel = '';
                            foreach ($tags as $tag) {
                                if($tag->id == $shop->tag_id) {
                                    $name = $tag->name;
                                    break;
                                }
                            }
                            ?>
                        <td>{{ $name}}</td>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->content }}</td>
                        <td>{{ $shop->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {!! link_to_route('shops.create', '店舗を投稿する', null, ['class' => 'btn btn-primary']) !!}
@endsection
