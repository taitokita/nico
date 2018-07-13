@if ($shops)
    <div class="row">
        @foreach ($shops as $shop)
            <div class="shop">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div id=images class="panel-heading text-center">
                            <img src="{{asset('item/'.$shop->path)}}">
                        </div>
                        
                        <div class="panel-body">
                            <h3 id="name1" class="shop-title">{!! link_to_route('shops.show', $shop->name, ['name' => $shop->id]) !!}</h>
                        </div>
                        
                        @if (isset($shop->count))
                            @if($shop->count!=$old)
                                <div class="panel-footer">
                                    <p class="text-center">{{ $rank=$rank+1}}位: {{ $old=$shop->count}}　件</p>
                                </div>
                            @else (isset($shop->count))
                                <div class="panel-footer">
                                    <p class="text-center">{{ $rank=$rank}}位: {{ $old=$shop->count}} 件</p>
                                </div>
                            @endif
                    
                        @else
                        <?php
                            $tagLabel = '';
                            foreach ($tags as $tag) {
                                if($tag->id == $shop->tag_id) {
                                    $name = $tag->name;
                               
                            break;
                                }
                            }
                            ?>
                            
                            <div class="panel-footer">
                                <p class="text-center">{{$name}}</p>
                            </div>
                            <div id="botton"  class="buttons text-center ">
                                @if (Auth::check())
                                    @include('shops.favorite_button', ['shop' => $shop])
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif





