@extends('base')

@section('content')
<div class="page-title">Post add</div>
<div class="form">
	<form action="/post-add/add" method="post">
		<input type="text" placeholder="title" name="title"><br>
		<textarea placeholder="content" name="content"></textarea><br>
		<button type="submit">Add post</button>
		@csrf
	</form>
</div>
@endsection