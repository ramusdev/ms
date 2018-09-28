@extends('base')

@section('content')
<div class="page-title">Admin area post list</div>
<br>
<div class="posts">
	@foreach($posts as $post)
		<form action="{{action('AdminController@postDelete', $post->id)}}" method="post">
			@csrf
			<div class="post-item">
				<div>Title: {{ $post->title }}</div>
				<div>Description: {{ $post->content }}</div>
				<button type="submit">Delete</button>
				<input type="hidden" name="_method" value="DELETE">
			</div><br>
		</form>
	@endforeach
</div>
@endsection