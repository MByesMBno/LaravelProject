@extends('app')
@section('content')
    <title>Редактирование товара</title>
    <style>
        .is-invalid{ color: red;}
        form{ width: 25%; height: 30%; background-color: rgb(0, 58, 104); border-radius: 15px; box-shadow: 2px 2px 5px black;
        color: white; display: block; margin: auto; font-size: 24px;}
        h2{ display: flex; justify-content: center;}
        input{width: 90%; font-size: 24px; margin: 15px;}
        label{margin: 10px;}
        select{font-size: 24px; margin: 15px;}
        #btn{margin: 10px 5px 15px 10px; border-radius: 5px; font-size: 24px}
    </style>


    <h2>Редактирование товара</h2>
    <form method="post" action="{{ url(route('update', $item->id)) }}">
        @csrf
        <label>Название</label>
        <input type="text" name="name" value="{{ old('name', $item->name) }}" />
        @error('name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Вкусы</label>
        <input type="text" name="tastes" value="{{ old('tastes', $item->tastes) }}"/>
        @error('tastes')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Описание</label>
        <input type="text" name="description" value="{{ old('description', $item->description) }}"/>
        @error('description')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Количество</label>
        <input type="text" name="quantity" value="{{ old('quantity', $item->quantity) }}"/>
        @error('quantity')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Цена</label>
        <input type="text" name="price" value="{{ old('price', $item->price) }}" />
        @error('price')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Категория:</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if(old('category_id', $item->category_id) == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" id="btn">Редактировать</button>
    </form>
@endsection
