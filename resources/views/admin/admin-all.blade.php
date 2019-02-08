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
                <a class="nav-link" href="/options">Настройки</a>
            </nav>
        </div>
        <div class="col-3 mt-3">
            <div class="card mb-3">
                <div class="card-header">Последние посты
                    <a href="{{ action('AdminPostController@addPost') }}" class="btn btn-secondary btn-sm">Добавить</a>
                </div>
                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="card-title small mb-2">
                            <a href="{{ action('AdminPostController@editPost', $post->id) }}">{{ $post->title }}</a>  
                            <div class="card-date">Дата: {{ $post->created_at->format('d.m.Y') }} <span>Коммент: 0</span></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
        </div>
        <div class="col-3 mt-3">
            <div class="card mb-3">
                <div class="card-header">Информация</div>
                <div class="card-body">
                    <p class="card-text">Постов: {{ $postAll }}</p>
                    <p class="card-text">Комментариев: {{ $commentAll }}</p>
                    <p class="card-text">Изображений: {{ $imageAll }}</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Новости</div>
                <div class="card-body">
                    @foreach ($parsNews as $item)
                        <div class="card-title small mb-2">
                            <a href="{{ $item->link }}">{{ $item->title }}</a>  
                            <div class="card-date">{{ $item->pub_date->format('d.m.Y') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
