@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9 admin-content">
            <div class="content">
                <div class="content-image">
                    @if ($post->image()->exists())
                        <img class="img-fluid" src="{{ url('storage/' . $post->image->path) }}">
                    @endif
                </div>
                <div class="conten-body">
                    <h5>{{ $post->title }}</h5>
                    <p>Дата публикации:: {{ $post->created_at->format('d.m.Y') }}</p>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
            <!--
            <div class="comment">
                <form action="{{ action('CommentController@storeComment', $post->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="textareaComment">Комментарий</label>
                        <textarea class="form-control" name="content" placeholder="Введите ваш комментарий"></textarea>
                    </div>
                    <button class="btn btn-secondary" type="submit">Добавить</button>
                </form>
            </div>
            <div class="comment-reply">
                <form action="{{ action('CommentController@storeReplyComment', $post->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="textareaComment">Ответ на комментарий</label>
                        <textarea class="form-control" name="content" placeholder="Введите ваш комментарий"></textarea>
                    </div>
                    <button class="btn btn-secondary" type="submit">Добавить</button>
                    <input type="hidden" name="parent" value="2">
                </form>
            </div>
            -->

            @include('partials.comment_replies', ['comments' => $post->comment])
                     
            <!--
            @include('partials.comment_replies', ['comments' => $post->comment])
            -->
        </div>
        <div class="col-3">
            Sidebar
        </div>
    </div>
</div>
@endsection
