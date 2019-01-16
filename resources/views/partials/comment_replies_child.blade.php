@foreach( $comments as $comment )
    <div class="comment-reply col-md-11 offset-md-1 col-sm-10 offset-sm-2">
        <div class="row">
            <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                <a href=""><img class="mx-auto rounded-circle" style="width:50px" src="http://via.placeholder.com/150x150"></a>
            </div>
            <div class="comment-content col-md-11 col-sm-10 col-12">
                <h6 class="small comment-meta"></h6><a href="">admin</a> day month year</h6>
                <div class="comment-body mb-2">
                    <p>{{ $comment->content }}</p>
                    <a href="" class="text-right small">Reply</a>
                </div>
            </div>
            @include('partials.comment_replies_child', ['comments' => $comment->replies])
        </div>
    </div>
@endforeach