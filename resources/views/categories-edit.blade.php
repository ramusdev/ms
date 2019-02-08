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
        @csrf
        <form class="col-5" action="{{ action('AdminCategoryController@storeCategory', $category->id ) }}" method="post">
            @csrf
            <h5 class="d-inline-block">Редактирование категории</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif    
            <div class="form-group">
                <label for="inputName">Название</label>
                <input class="form-control" type="text" id="inputName" name="name" value="{{ $category->name }}" placeholder="Название категории">
            </div>
            <div class="form-group">
                <label for="inputSlug">Слаг</label>
                <input class="form-control" type="text" id="inputSlug" name="slug" value="{{ $category->slug }}" placeholder="Слаг категории">
            </div>
            <button class="btn btn-secondary" type="submit">Сохранить</button>
        </form>
        <div class="col-5">
            <h5 class="d-inline-block">Категории</h5>
            <table class="table">
				<tbody>
					@foreach($categories as $category)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td><a href="">{{ $category->name }}</a></td>
							<td>{{ $category->created_at->format('d.m.Y') }}</td>
							<td>
								<a class="btn btn-outline-secondary btn-sm" href="{{ action('AdminCategoryController@editCategory', $category->id) }}" role="button">Редактирование</a>
								<a class="btn btn-outline-danger btn-sm" href="{{ action('AdminCategoryController@deleteCategory', $category->id) }}" role="button">Удаление</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
            {{ $categories->links() }}
        </div>  
	</div>
</div>
@endsection