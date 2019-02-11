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
        <form class="col-7 mt-3" method="post" action="{{ action('AdminSettingController@storeMain') }}">
            @csrf
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">Настройки
                    <!-- <a href="{{ action('AdminPostController@addPost') }}" class="btn btn-secondary btn-sm">Добавить</a> -->
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nameInput">Название</label>
                        <input type="text" class="form-control" name="title" value="{{ $setting->title }}" id="nameInput" placeholder="Название">
                        <small class="form-text text-muted">Используется в названии title</small>
                    </div>
                    <div class="form-group">
                        <label for="descriptionInput">Описание</label>
                        <input type="text" class="form-control" name="description" value="{{ $setting->description }}" id="descriptionInput" placeholder="Описание">
                        <small class="form-text text-muted">Используется в description</small>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $setting->email }}" id="emailInput" placeholder="Email администратора">
                        <small class="form-text text-muted">Будет использоваться для отправки уведомлений</small>
                    </div>
                    <button type="submit" class="btn btn-secondary">Сохранить</button>
                </div>
            </div>
        </form>
        <div class="col-3 mt-3">
            <div class="card mb-3">
                <div class="card-header">Изображения</div>
                <form class="card-body" method="post" action="{{ action('AdminImageCompress@compress') }}">
                    @csrf
                    <p>Без оптимизации: {{ $imageNotOptimizedNum }}<p>
                    <p>Оптимизированные: {{ $imageOptimizedNum }}</p>
                    <button type="submit" class="btn btn-secondary">Запустить сжатие</button>
                </form>
            </div>
            <div class="card mb-3">
                <div class="card-header">Изображения Tinypng</div>
                <form class="card-body" method="post" action="{{ action('AdminSettingController@storeImage') }}">
                    @csrf
                    <div class="form-group">
                        <label for="imageWidth">По ширыне</label>
                        <input type="text" name="image_width" value="{{ $setting->image_width }}" class="form-control" id="imageWidth" placeholder="Email администратора">
                        <small class="form-text text-muted">Максимальный размер по ширыне</small>
                    </div>
                    <div class="form-group">
                        <label for="imageHeight">По высоте</label>
                        <input type="text" name="image_height" value="{{ $setting->image_height }}" class="form-control" id="imageHeight" placeholder="Email администратора">
                        <small class="form-text text-muted">Максимальный размер по высоте</small>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Api ключ</label>
                        <input type="text" name="image_key" value="{{ $setting->image_key }}" class="form-control" id="imageInput" placeholder="Api ключ">
                        <small class="form-text text-muted">Api ключ для сжатия изображений</small>
                    </div>
                    <button type="submit" class="btn btn-secondary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
