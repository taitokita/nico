<ul class="media-list">
@foreach ($reviews as $review)
    <?php $user = $review->user; ?>
    <li class="media">
        <div class="media-left">
            <img src="{{ Gravatar::src($user->password, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $review->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($review->content)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $review->user_id)
                    {!! Form::model($review, ['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
