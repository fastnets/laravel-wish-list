<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Запустите миграцию.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id(); // ID записи в списке желаемого
            $table->string('title'); // Название желания
            $table->text('description'); // Описание желания
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с пользователем
            $table->timestamps(); // Два поля: created_at и updated_at
        });
    }

    /**
     * Откатить миграцию.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
