<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // ID заказа
            $table->unsignedBigInteger('item_id'); // ID товара
            $table->string('item_type'); // Тип товара (aroma, decor, cosmetic)
            $table->integer('quantity'); // Количество товара в заказе
            $table->decimal('price', 8, 2); // Цена товара на момент заказа
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
