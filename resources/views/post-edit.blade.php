@extends('base')

@section('content')
<div class="container-fluid">
	<form class="row" action="{{ action('PostController@editAction', $post->id) }}" method="post">
        <div class="col-2 admin-bar">
            <nav class="nav flex-column">
                <a class="nav-link" href="/posts">Посты</a>
                <a class="nav-link" href="/pages">Страницы</a>
                <a class="nav-link" href="/messages">Сообщения <span class="badge">2</span></a>
                <a class="nav-link" href="/options">Настройки</a>
            </nav>
        </div>
        @csrf
        <div class="col-7">
            <h5 class="d-inline-block">Редактирование поста</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif    
            <div class="form-group">
                <label for="inputTitle">Заголовок</label>
                <input class="form-control" type="text" id="inputTitle" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="textareaContent">Контент</label>
                <textarea class="form-control" rows="10" name="content" id="textareaContent">{{ $post->content }}</textarea>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-light mb-3">
                <div class="card-header">Настройки</div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option @if ($post->status == 'published') selected @endif value="published">Опубликовано</option>
                            <option @if ($post->status == 'pending') selected $@endif value="pending">Снято</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Сохранить</button>
                    <a class="btn btn-danger" href="/post-all/delete/{{ $post->id }}">Удалить</a>
                    <a class="btn btn-info" href="/post-add">Новый</a>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Информация</div>
                <div class="card-body">
                    <p class="card-text">Дата публикации: {{ $post->created_at->format('d.m.Y') }}</p>
                    <p class="card-text">Ссылка: {{ url()->current() }}</p>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Категории</div>
                <div class="card-body">
                </div>
            </div>
            <div class="card bg-light mb-3">
                <img class="card-image-top" src="http://via.placeholder.com/443x200">
                <div class="card-body">
                    <h5 class="card-title">Миниатюра</h5>
                    <p class="card-text">About image</p>
                    <a class="btn btn-secondary" href="/">Загрузить</a>
                </div>
            </div>
        </div>  
	</form>
</div>
@endsection