<title>Список товаров</title>
@extends('app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Список товаров</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                        <th>Вкусы</th>
                        <th>Цена</th>
                        <th>Категория</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->tastes }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger btn-sm">Удалить</a>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $items->links() }}
        </div>
        <div class="form-group row mb-0 ">
            <a href="{{ route('create') }}" class="btn text-white">Добавить товар</a>
        </div>
    </div>
@endsection

