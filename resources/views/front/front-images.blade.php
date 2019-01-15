@extends('base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-9 admin-content">
            <h5 class="d-inline-block">Изображения</h5>
            @foreach ($images as $image)
                <div class="card mb-3">
                    <img class="card-img-top" src="{{ url('storage/' . $image->path) }}">
                    <div class="card-header">Дата публикации:: {{ $image->created_at->format('d.m.Y') }}</div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ action('ImageController@showImage', $image->id) }}">{{ $image->name }}</a></h5>
                    </div>
                </div>
            @endforeach
            {{ $images->links() }}
		</div>
        <div class="col-3">
            Sidebar
        </div>
	</div>
</div>
@endsection