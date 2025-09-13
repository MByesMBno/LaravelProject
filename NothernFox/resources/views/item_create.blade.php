<title>Добавление товара</title>
@extends('app')
@section('content')
<div class="container mt-5">
    <div class="form-container">
        <h2>Добавление товара</h2>
        <form method="post" action="{{ url(route('item_list')) }}">
            @csrf
            <div class="mb-3">
                <label for="name">Название</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tastes">Вкусы</label>
                <input type="text" id="tastes" name="tastes" value="{{ old('tastes') }}" class="form-control @error('tastes') is-invalid @enderror" />
                @error('tastes')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Описание</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" />
                @error('description')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity">Количество</label>
                <input type="text" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" />
                @error('quantity')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price">Цена</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" />
                @error('price')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id">Категория:</label>
                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection


