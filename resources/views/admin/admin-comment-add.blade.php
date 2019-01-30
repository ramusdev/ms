@extends('base')

@section('content')
<div class="container-fluid">
	<form class="row" action="{{ action('AdminCommentController@storeComment', [$model, $id]) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="col-2 admin-bar">
            <nav class="nav flex-column">
                <a class="nav-link" href="/posts">Посты</a>
                <a class="nav-link" href="/pages">Страницы</a>
                <a class="nav-link" href="/messages">Сообщения <span class="badge">2</span></a>
                <a class="nav-link" href="/options">Настройки</a>
            </nav>
        </div>
        <div class="col-7">
            <h5 class="d-inline-block">Добавить комментарий</h5>
            @if (session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-group">
                <label for="textareaContent">Комментарий</label>
                <textarea class="form-control" rows="5" name="content" id="textareaContent" placeholder="Описание"></textarea>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="card bg-light mb-3">
                <div class="card-header">Настройки</div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="published">Опубликовано</option>
                            <option value="pending">Снято</option>
                            <option value="spam">Спам</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Сохранить</button>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">Информация</div>
                <div class="card-body">
                </div>
            </div>
        </div>  
	</form>
</div>
@endsection