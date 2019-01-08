@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-2 admin-bar">
			<nav class="nav flex-column">
				<a class="nav-link" href="/posts">Посты</a>
				<a class="nav-link" href="/posts">Страницы</a>
				<a class="nav-link" href="/posts">Сообщения <span class="badge">2</span></a>
				<a class="nav-link" href="/options">Настройки</a>
			</nav>
		</div>
		<div class="col-10 admin-content">
			<table class="table">
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td><a href="/post">{{ $post->title }}</a></td>
							<td>10.01.2019</td>
							<td>
								<a class="btn btn-outline-secondary btn-sm" href="/post-edit/{{ $post->id }}" role="button">Редактирование</a>
								<a class="btn btn-outline-danger btn-sm" href="/post-all/delete/{{ $post->id }}" role="button">Удаление</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection