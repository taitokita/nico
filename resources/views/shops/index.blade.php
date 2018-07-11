@extends('layouts.app')

@section('content')
    <div class="cover2">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Nico index</h1>
                <h1>{!! link_to_route('shops.create', '店舗を投稿する', null, ['class' => 'btn btn-primary']) !!}<h1>
            </div>
        </div>
    </div>
    <form method="get" action="{{route('shops.index')}}">
    <input type="text" name="name" class="form-control" placeholder="店を検索">
    <!--<input type="text" name="email">-->
    <input type="hidden" name="maction" value="search">
    <input type="submit" value="検索" class="btn btn-info">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
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
@endsection
