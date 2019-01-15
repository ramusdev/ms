@extends('base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-9 admin-content">
            <h5 class="d-inline-block">Посты</h5>
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">Дата публикации:: {{ $post->created_at->format('d.m.Y') }}</div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ action('PostController@showPost', $post->id) }}">{{ $post->title }}</a></h5>
                        <p class="card-text">{{ str_limit($post->content, 100) }}</p>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
		</div>
        <div class="col-3">
            Sidebar
        </div>
	</div>
</div>
@endsection