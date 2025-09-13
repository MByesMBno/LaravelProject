@extends('app')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@section('content')
@if($user)
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h2 class="alert-heading">Добро пожаловать, {{ $user->name }}</h2>
        <a href="{{ url('categories') }}" class="btn btn-danger">Перейти в каталог</a>
    </div>
</div>
@else
<div class="container mt-5">
    <h2 class="mb-4">Вход в систему</h2>
    <form method="post" action="{{ url('auth') }}" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
    <a href="{{ route('register') }}" class="btn btn-link">Зарегистрироваться</a>
    @error('error')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror
</div>
@endif
@endsection

