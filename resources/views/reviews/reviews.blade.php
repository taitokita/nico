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
            <style type="text/css"
>#submit:hover {
color: #ffffff;

}
#button-delete:hover{
 background-color: #D6858B;
 color: #ffffff;
}
#button-delete{
 background-color: #B83F3D;
 color: #e6e6fa;
 font-family: 'Teko', sans-serif;
 font-size:20px;
 height:35px;
 width:95px;
 border:solid 1px #fff;
}
.review_comments{
   color: #e6e6fa;
   font-family: 'Teko', sans-serif;
   font-size:30px;
}
</style>      
             
              <div class="form-group">
                  @if (Auth::id() == $review->user_id)
                          {!! Form::model($review, ['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                              <div class="submit">
                                  <div id="submit_delete">
                                      <input type="submit" value="Delete" id="button-delete"/>
                                  </div>
                              </div>
                          {!! Form::close() !!}
                  @endif
              </div>
          </div>
  </li>
@endforeach
</ul>
