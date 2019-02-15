@extends('base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-9 mt-3">
            <h2>{{ $product->title }}</h2>
            <p class="card-text"><small class="text-muted">Добавлен: {{ $product->created_at->format('d.m.Y') }}</small></p>
            <p>{{ $product->description }}</p>
            <button type="submit" class="btn btn-secondary">Добавить</button>
		</div>
        <div class="col-3 mt-3">
            <h5 class="d-inline-block">Сайдбар</h5>
        </div>
	</div>
</div>
@endsection