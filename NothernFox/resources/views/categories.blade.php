@extends('app')
<link rel="stylesheet" href="{{asset('css/cards.css')}}">
@section('content')
<h1>Каталог</h1>
<div class="row">
    @foreach($categories as $category)
    <div class="col-md-4 mb-4">
        <div class="card-body">
            @if($category->images->isNotEmpty())
                @foreach ($category->images as $image)
                    <img src="{{Storage::disk('yandex')->url($image->url)}}" alt="{{ $category->name }}">
                @endforeach
            @else
                <img src="{{ asset('images/placeholder.jpg') }}" alt="{{ $category->name }}">
            @endif
            <div class="card-overlay"></div>
            <h5 class="card-title">{{ $category->name }}</h5>
            <a href="{{ route('category', $category) }}" class="btn btn-primary">Ассортимент</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
