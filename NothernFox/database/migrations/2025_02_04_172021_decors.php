<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('decors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название товара
            $table->text('tastes')->nullable();
            $table->text('description')->nullable(); // Описание товара
            $table->decimal('price', 8, 2); // Цена товара
            $table->integer('quantity')->default(0); // Количество товара
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('decors');
    }
};
