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
                <a class="nav-link" href="{{ action('AdminSettingController@all') }}">Настройки</a>
            </nav>
        </div>
        <form class="col-7 mt-3" method="post" action="{{ action('AdminProductController@storeMain') }}">
            @csrf
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">Добавить продукт
                    <!-- <a href="{{ action('AdminPostController@addPost') }}" class="btn btn-secondary btn-sm">Добавить</a> -->
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nameInput">Название</label>
                        <input type="text" class="form-control" name="title" value="" id="nameInput">
                    </div>
                    <div class="form-group">
                        <label for="descriptionInput">Описание</label>
                        <textarea type="text" class="form-control" name="description" value="" id="descriptionInput"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary">Сохранить</button>
                </div>
            </div>
        </form>
        <div class="col-3 mt-3">
            <div class="card mb-3">
                <div class="card-header">Информация</div>
                <form class="card-body" method="post" action="{{ action('AdminProductController@storePrice') }}">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="published">Доступен</option>
                            <option value="pending">Снять</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amountInput">Колличество</label>
                        <input type="text" class="form-control" name="amount" value="" id="amountInput">
                    </div>
                    <div class="form-group">
                        <label for="priceInput">Стоимость</label>
                        <input type="text" class="form-control" name="price" value="" id="priceInput">
                    </div>
                    <button type="submit" class="btn btn-secondary">Сохранить</button>
                </form>
            </div>
            <div class="card mb-3">
                <div class="card-header">Изображения</div>
                <form class="card-body" method="post" action="{{ action('AdminSettingController@storeImage') }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
