@extends('base')

@section('content')
<div class="container-fluid">
	<form class="row" action="{{ action('PostController@storePost')}}" enctype="multipart/form-data" method="post">
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
            <h5 class="d-inline-block">Новый пост</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif    
            <div class="form-group">
                <label for="inputTitle">Заголовок</label>
                <input class="form-control" type="text" id="inputTitle" name="title" value="" placeholder="Заголовок поста">
            </div>
            <div class="form-group">
                <label for="textareaContent">Контент</label>
                <textarea class="form-control" rows="10" name="content" id="textareaContent" placeholder="Описание"></textarea>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-light mb-3">
                <div class="card-header">Настройки</div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="published">Опубликовано</option>
                            <option selected value="pending">Снято</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Сохранить</button>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Категории</div>
                <div class="card-body">
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputFile">Загрузить миниатюру</label>
                        <input class="form-control-file" type="file" id="inputFile" name="thumbnail">
                    </div>
                </div>
            </div>
        </div>  
	</form>
</div>
@endsection