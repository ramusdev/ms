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
        <div class="col-10">
            <h5>Галерея</h5>
			<table class="table">
				<tbody>
					@foreach($images as $image)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
                            <th>
                                <img class="rounded" style="width:50px" src="{{ $image->path }}">
                            </th>
							<td><a href="{{ $image->path }}">{{ $image->title }}</a></td>
							<td>{{ $image->created_at->format('d.m.Y') }}</td>
							<td>
                                <a class="btn btn-outline-danger btn-sm" href="/image/delete/{{ $image->id }}" role="button">Удаление</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
        </div>
	</div>
</div>
@endsection