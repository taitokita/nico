@if ($shops)
    <div class="row">
        @foreach ($shops as $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $shop->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            <p class="shop-title"><a href="#">{{ $shop->name }}</a></p>
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('shops.favorite_button', ['shop' => $shop])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif