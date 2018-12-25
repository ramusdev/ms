@extends('base')

@section('content')
<div class="page-title">Edit post</div><br>
<div class="form">
	<form action="/post-edit/edit" method="post">
        @csrf
		<input type="text" placeholder="title" name="title" value="{{ $post->title }}"><br>
		<textarea placeholder="content" name="content">{{ $post->content }}</textarea><br>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
		<button type="submit">Save post</button>
	</form>
</div>
@endsection