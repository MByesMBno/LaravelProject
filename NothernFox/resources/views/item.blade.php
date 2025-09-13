@extends('app')
<link rel="stylesheet" href="{{asset('css/items.css')}}">
@section('content')
@php
    $cleanedTastes = str_replace(['"', "'"], '', $item->tastes);
    $tastesArray = array_filter(array_map('trim', explode(',', $cleanedTastes)));
@endphp
<div class="item">
    <div class="card-item">
        <div class="card-body-item">
            @foreach ($item->images as $image)
                <img src="{{Storage::disk('yandex')->url($image->url)}}" alt="">
             @endforeach
            <div class="card-text">
                <h2 class="card-title">{{ $item->name }}</h2>
                @if(count($tastesArray) > 0)
                <form>
                    <div class="__select" data-state="">
                      <div class="__select__title" >Вкусы</div>
                      <div class="__select__content">
                        @foreach($tastesArray as $taste)
                            <input id="singleSelect0" class="__select__input" type="radio" name="singleSelect" checked />
                            <label for="singleSelect" class="__select__label">{{$taste}}</label>
                        @endforeach
                      </div>
                    </div>
                </form>
                @endif
                <p>{{ $item->description }}</p>
                <p>Цена: {{ $item->price }} руб.</p>
                <p>Количество: {{ $item->quantity }}</p>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="/js/app.js"></script>
@endsection



