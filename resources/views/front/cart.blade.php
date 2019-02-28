@extends('base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-9 admin-content">
            <h5 class="d-inline-block">Корзина</h5>
            <table class="table">
				<tbody>				
                    @foreach($items as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href=""><img class="rounded admin-all-images" src=""></a></td>
                            <td>Title</td>
                            <td>
                                <a class="btn btn-outline-secondary btn-sm" href="" role="button">Редактирование</a>
                                <a class="btn btn-outline-danger btn-sm" href="" role="button">Удаление</a>
                            </td>
                        </tr>
                    @endforech
				</tbody>
			</table>
		</div>
        <div class="col-3">
            <div class="card mb-3">
                <div class="card-header">Информация о заказе</div>
                <div class="card-body">
                    <h5 class="card-title"><a href=""></a></h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection