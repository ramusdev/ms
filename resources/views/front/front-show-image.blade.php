@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9 admin-content">
            <h5 class="d-inline-block">Изображение</h5>
            <div class="content">
                <div class="content-image">    
                    <img class="img-fluid" src="{{ url('storage/' . $image->path) }}">
                </div>
                <div class="conten-body">
                    <h5>{{ $image->title }}</h5>
                    <p>Дата публикации:: {{ $image->created_at->format('d.m.Y') }}</p>
                </div>
            </div>
            @include('partials.comment_replies', ['comments' => $image->comment, 'post' => $image])
        </div>
        <div class="col-3">
            Sidebar
        </div>
    </div>
</div>
@endsection
