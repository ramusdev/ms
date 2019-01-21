<div class="comments">
    <h4 class="mb-2">Comments</h4>
    @foreach( $comments as $comment )
        <div class="comment mb-2 row">
            <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                <a href=""><img class="mx-auto rounded-circle" style="width:50px" src="http://via.placeholder.com/150x150"></a>
            </div>
            <div class="comment-content col-md-11 col-sm-10">
                <h6 class="small comment-meta"></h6><a href="">admin</a> {{ $comment->created_at->format('d.m.Y') }}</h6>
                <div class="comment-body mb-2">
                    <p>{{ $comment->content }}</p>
                    <a href="" class="text-right small reply-to-comment">Reply</a>
                </div>
                <div class="comment-form-reply mb-3">
                    <form action="{{ action('CommentController@storeReplyComment', [strtolower(class_basename($post)), $post->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="textareaComment">Ответ на комментарий</label>
                            <textarea class="form-control" name="content" placeholder="Введите ваш комментарий"></textarea>
                        </div>
                        <button class="btn btn-secondary" type="submit">Добавить</button>
                        <input type="hidden" name="parent" value="{{ $comment->id }}">
                    </form>
                </div>
            </div>
            @include('partials.comment_replies_child', ['post' => $post, 'comments' => $comment->child])
        </div>
    @endforeach
</div>
<div class="comment-form mb-3">
    <form action="{{ action('CommentController@storeComment', [strtolower(class_basename($post)), $post->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="textareaComment">Комментарий</label>
            <textarea class="form-control" name="content" placeholder="Введите ваш комментарий"></textarea>
        </div>
        <button class="btn btn-secondary" type="submit">Добавить</button>
    </form>
</div>