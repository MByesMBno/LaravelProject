<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("aromas", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text('description')->nullable(); // Описание товара
            $table->decimal('price', 8, 2); // Цена товара
            $table->integer('count')->default(0); // Количество товара
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aromas');
    }
};
