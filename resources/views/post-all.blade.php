@extends('base')

@section('content')
<div class="page-title">Post all</div><br>
<div class="posts">
	@foreach($posts as $post)
		<div class="post-item">
			<p>Title: {{ $post->title }}</p>
			<p>Description: {{ $post->content }}</p>
            <a href="/post-edit/{{ $post->id }}"><button>Edit</button></a>
			<a href="/post-all/delete/{{ $post->id }}"><button>Delete</button></a>
		</div><br>
	@endforeach
</div>
@endsection