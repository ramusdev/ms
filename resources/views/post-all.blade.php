@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-2 admin-bar">
			<nav class="nav flex-column">
				<a class="nav-link" href="/posts">Посты</a>
				<a class="nav-link" href="/pages">Страницы</a>
				<a class="nav-link" href="/messages">Сообщения <span class="badge">2</span></a>
				<a class="nav-link" href="/options">Настройки</a>
			</nav>
		</div>
		<div class="col-10 admin-content">
            <h5 class="d-inline-block">Список постов</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif  
			<table class="table">
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td><a href="{{ action('PostController@editPost', $post->id) }}">{{ $post->title }}</a></td>
							<td>{{ $post->created_at->format('d.m.Y') }}</td>
							<td>
								<a class="btn btn-outline-secondary btn-sm" href="{{ action('PostController@editPost', $post->id) }}" role="button">Редактирование</a>
								<a class="btn btn-outline-danger btn-sm" href="{{ action('PostController@deletePost', $post->id) }}" role="button">Удаление</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
            {{ $posts->links() }}
		</div>
	</div>
</div>
@endsection