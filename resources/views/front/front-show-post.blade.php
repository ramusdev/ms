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
            @include('partials.comment_replies', ['post' => $post, 'comments' => $comments])
        </div>
        <div class="col-3">
            Sidebar
        </div>
    </div>
</div>
@endsection
