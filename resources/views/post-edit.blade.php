@extends('base')

@section('content')
<div class="container-fluid">
	<form class="row" action="{{ action('PostController@storeAction', $post->id) }}" enctype="multipart/form-data" method="post">
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
                <input class="form-control" type="text" id="inputTitle" name="title" value="{{ $post->title }}" placeholder="Заголовок поста">
            </div>
            <div class="form-group">
                <label for="textareaContent">Контент</label>
                <textarea class="form-control" rows="10" name="content" id="textareaContent" placeholder="Описание">{{ $post->content }}</textarea>
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
                    <a class="btn btn-danger" href="{{ action('PostController@deletePost', $post->id) }}">Удалить</a>
                    <a class="btn btn-info" href="{{ action('PostController@addPost') }}">Новый</a>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Информация</div>
                <div class="card-body">
                    <p class="card-text">Дата публикации: {{ $post->created_at->format('d.m.Y') }}</p>
                    <p class="card-text">Пост: {{ url()->current() }}</p>
                    @if ($post->image()->exists())
                        <p class="card-text">Миниатюра: {{ url('storage/' . $post->image->path) }}</p>
                    @endif
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Категории</div>
                <div class="card-body">
                </div>
            </div>
            <div class="card bg-light mb-3">
                @if ($post->image()->exists())
                    <img class="card-image-top admin-card-img" src="{{ url('storage/' . $post->image->path) }}"> 
                @endif
                <div class="card-body">
                    <div class="form-group">
                        @if ($post->image()->exists())
                            <label for="inputFile">{{ $post->image->name }}</label>
                        @else
                            <label for="inputFile">Загрузить миниатюру</label>
                        @endif
                        <input class="form-control-file" type="file" id="inputFile" name="thumbnail">
                    </div>
                </div>
            </div>
        </div>  
	</form>
</div>
@endsection