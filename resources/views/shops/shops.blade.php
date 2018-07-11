@if ($shops)
    <div class="row">
        @foreach ($shops as $key => $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div id=images class="panel-heading text-center">
                            <img src="{{asset('item/'.$shop->path)}}">
                        </div>
                        <div class="panel-body">
                            <h3 id="name1" class="shop-title">{!! link_to_route('shops.show', $shop->name, ['name' => $shop->id]) !!}</h3>
                            <div id="botton" class="buttons text-center ">
                                @if (Auth::check())
                                    @include('shops.favorite_button', ['shop' => $shop])
                                @endif
                            </div>
                            
                            
                              </div>
                        @if (isset($shop->count))
                            @if($shop->count!=$old)
                                <div class="panel-footer">
                                    <p class="text-center">{{ $key=$key+1}}位: {{ $old=$shop->count}} いいね</p>
                                </div>
                            @elseif (isset($shop->count))
                                <div class="panel-footer">
                                    <p class="text-center">{{ $key=$key}}位: {{ $old=$shop->count}} いいね</p>
                                </div>
                            @else
                                <div class="panel-footer">
                                    <p class="text-center">{{ $shop->content}}</p>
                                </div>
                            @endif
                        @endif
                    </div>
                    
                    
                </div>
            </div>
        @endforeach
    </div>
@endif





