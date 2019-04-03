@extends('base')

@section('content')
<div class="container mt-3">
	<div class="row">
		<div class="col-9 admin-content">
            <h5 class="d-inline-block">Корзина</h5>
            <a href="{{ action('CartController@clear') }}" class="btn btn-outline-secondary btn-sm">Очистить</a>
            <table class="table mt-3">
				<tbody>				     
                    @foreach ($entries as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href=""><img class="rounded admin-all-images" src=""></a></td>
                            <td><a href="/product/{{ $item->product->id }}"">{{ $item->product->title }}</a></td>
                            <td>{{ $item->quantity }} шт.</td>
                            <td>{{ $item->product->amount }} грн.</td>
                            <td>
                                <a class="btn btn-outline-danger btn-sm" href="{{ action('CartController@delete', $item->product->id) }}" role="button">Удаление</a>
                            </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
        <div class="col-3">
            <div class="card mb-3">
                <div class="card-header">Информация о заказе</div>
                <div class="card-body">
                    <h5 class="card-title"><a href=""></a></h5>
                    <p class="card-text">Скидка: </p>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection