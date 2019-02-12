@extends('base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-9 mt-3">
            @foreach ($products as $product)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="http://via.placeholder.com/200" class="card-img" style="height:200px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ action('ProductController@show', $product->id) }}">{{ $product->title }}</a></h5>
                                <p class="card-text">{{ str_limit($product->description, 100) }}</p>
                                <p class="card-text"><small class="text-muted">Добавлен: {{ $product->created_at->format('d.m.Y') }}</small></p>
                                <button type="submit" class="btn btn-secondary">Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
		</div>
        <div class="col-3 mt-3">
            <h5 class="d-inline-block">Сайдбар</h5>
        </div>
	</div>
</div>
@endsection