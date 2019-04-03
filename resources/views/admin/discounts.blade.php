@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-2 admin-bar">
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ action('AdminMainController@all') }}">Консоль</a>
                <a class="nav-link" href="{{ action('AdminPostController@allPosts') }}">Посты</a>
                <a class="nav-link" href="{{ action('AdminImageController@allImages') }}">Изображения</a>
                <a class="nav-link" href="{{ action('AdminCategoryController@allCategories') }}">Категории</a>
                <a class="nav-link" href="{{ action('AdminDiscountController@show') }}">Скидочные коды</a>
                <a class="nav-link" href="/options">Настройки</a>
            </nav>
        </div>
        <form class="col-5 mt-3" action="{{ action('AdminDiscountController@add') }}" method="post">
            @csrf
            <h5 class="d-inline-block">Добавить код</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif    
            <div class="form-group">
                <label for="inputName">Скидочный код</label>
                <input class="form-control" type="text" id="inputName" name="code" value="" placeholder="Скидочный код">
            </div>
            <div class="form-group">
                <label for="inputSlug">Величина скидки</label>
                <input class="form-control" type="number" id="inputSlug" name="discount" value="" placeholder="Величина скидки в процентах">
            </div>
            <button class="btn btn-secondary" type="submit">Добавить</button>
        </form>
        <div class="col-5 mt-3">
            <h5 class="d-inline-block">Скидочные коды</h5>
            <table class="table">
				<tbody>
					
						<tr>
							<th scope="row">1</th>
							<td><a href="">Title</a></td>
							<td>Date</td>
							<td>
								<a class="btn btn-outline-secondary btn-sm" href="" role="button">Редактирование</a>
								<a class="btn btn-outline-danger btn-sm" href="" role="button">Удаление</a>
							</td>
						</tr>
					
				</tbody>
			</table>
            Pagination
        </div>  
	</div>
</div>
@endsection