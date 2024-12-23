<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * ��������� ��������.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id(); // ID ������ � ������ ���������
            $table->string('title'); // �������� �������
            $table->text('description'); // �������� �������
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ����� � �������������
            $table->timestamps(); // ��� ����: created_at � updated_at
        });
    }

    /**
     * �������� ��������.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
