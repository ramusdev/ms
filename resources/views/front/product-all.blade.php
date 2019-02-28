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
                            <form class="card-body" method="post" action="{{ action('ProductController@addToCard', $product->id) }}">
                                @csrf
                                <h5 class="card-title"><a href="{{ action('ProductController@show', $product->id) }}">{{ $product->title }}</a></h5>
                                <p class="card-text">${{ $product->price }}</p>
                                <p class="card-text"><small class="text-muted">Добавлен: {{ $product->created_at->format('d.m.Y') }}</small></p>
                                <button type="submit" class="btn btn-secondary">Добавить</button>
                            </form>
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