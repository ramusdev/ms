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
			<table class="table">
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td><a href="/post-edit/{{ $post->id }}">{{ $post->title }}</a></td>
							<td>{{ $post->created_at->format('d.m.Y') }}</td>
							<td>
								<a class="btn btn-outline-secondary btn-sm" href="/post-edit/{{ $post->id }}" role="button">Редактирование</a>
								<a class="btn btn-outline-danger btn-sm" href="/post-all/delete/{{ $post->id }}" role="button">Удаление</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
            <nav>
                <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href="">1</a></li>
                    <li class="page-item"><a class="page-link" href="">2</a></li>
                    <li class="page-item"><a class="page-link" href="">3</a></li>
                    <li class="page-item"><a class="page-link" href="">4</a></li>
                    <li class="page-item"><a class="page-link" href="">5</a></li>
                </ul>
            </nav>
		</div>
	</div>
</div>
@endsection