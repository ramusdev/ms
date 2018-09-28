@extends('base')

@section('content')
<div class="page-title">Admin area post list</div>
<div class="posts">
	@foreach($posts as $post)
		<div class="post-item">
			<p>Title: {{ $post->title }}</p>
			<p>Description: {{ $post->content }}</p>
			<button type="">Delete</button>
		</div><br>
	@endforeach
</div>
@endsection