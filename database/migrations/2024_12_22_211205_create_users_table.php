<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Запустите миграцию.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID пользователя
            $table->string('name'); // Имя пользователя
            $table->string('email')->unique(); // Электронная почта, уникальная для каждого пользователя
            $table->string('password'); // Пароль
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
        Schema::dropIfExists('users');
    }
}
