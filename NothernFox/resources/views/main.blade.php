@extends('app')
@section('content')
<div class="containera mt-5" style="background-image: url('{{Storage::disk("yandex")->url("views/cardBack.jpg")}}');">
    <div class="row">
        <div class="Head-text"><h1>Добро пожаловать в магазин косметики и аксессуаров для дома «Северный Лис»</h1></div>
        <div class="col-md-8">
            <div class="mt-4">
                <p class="lead">Помогу решить 3 самых частых вопроса:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">«Что подарить подружке?»</li>
                    <li class="list-group-item">«Как удивить любимых?»</li>
                    <li class="list-group-item">«Как провести время с пользой для тела?»</li>
                </ul>
                <p class="mt-3">У меня можно приобрести не только косметику, но и товары для дома, а также подарки для себя любимых. Я обожаю свое дело, поэтому в моем ассортименте есть все необходимое для ухода за телом и душой.</p>
                <p>В работе использую только натуральные ингредиенты, которые не вызывают аллергию, хорошо переносятся кожей и подходят для всех. Косметика не содержит вредных веществ и химических красителей.</p>
                <p>Мне важно, чтобы Вы были уверены в своем выборе, поэтому я всегда готова ответить на любые Ваши вопросы.</p>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{Storage::disk("yandex")->url("views/hiiImage.jpg")}}" alt="Изображение магазина" class="img-fluid rounded-1g">
        </div>
    </div>
</div>
@endsection

