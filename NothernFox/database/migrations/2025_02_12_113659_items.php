<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название товара
            $table->unsignedBigInteger('category_id');
            $table->text('tastes')->nullable(); // Возможные Вкусы
            $table->text('description')->nullable(); // Описание товара
            $table->decimal('price', 8, 2); // Цена товара
            $table->integer('quantity')->default(0); // Количество товара
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
