<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .product-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 300px;
        margin: 0 auto;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .product-card h3 {
        margin: 0 0 10px;
        font-size: 20px;
        color: #333;
    }
    .product-card p {
        margin: 0 0 10px;
        font-size: 14px;
        color: #555;
    }
    .product-card .price {
        font-size: 18px;
        font-weight: bold;
        color: #27ae60;
    }
    .product-card .quantity {
        font-size: 14px;
        color: #777;
    }
</style>
<body>
    @foreach ($category as $i)
        <div class="product-card">
            <h3>{{$i->name}}</h3>
            <p><strong>ID:</strong> {{$i->id}}</p>
            <p><strong>Вкусы:</strong> {{$i->tastes}}</p>
            <p><strong>Описание:</strong> {{$i->description}}</p>
            <p class="price"><strong>Цена:</strong> {{$i->price}} руб</p>
            <p class="quantity"><strong>Количество:</strong> {{$i->quantity}}</p>
        </div>
    @endforeach
</body>
</html>
