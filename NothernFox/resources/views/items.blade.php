@extends('app')
<link rel="stylesheet" href="{{asset('css/items.css')}}">
@section('content')
<h1>{{$category->name}}</h1>
<div class="row">
    @foreach($items as $item)
    <div class="col-md-4 mb-4">
        <div class="card-body">
            @if($item->images->isNotEmpty())
                @foreach ($item->images as $image)
                    <img src="{{Storage::disk('yandex')->url($image->url)}}" alt="{{ $item->name }}" class="img-first">
                    @if ($image->second_url != Null)
                        <img src="{{Storage::disk('yandex')->url($image->second_url)}}" alt="{{ $item->name }}" class="img-second">
                    @endif
                @endforeach
            @endif
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-price">Цена: {{ $item->price }} руб.</p>
            <a href="{{ route('item', [$category, $item])}}" class="btn btn-primary">Подробнее</a>
            <a href="{{ route('item', [$category, $item])}}" class="btn btn-primary" id="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
        </div>
    </div>
    @endforeach
@endsection


