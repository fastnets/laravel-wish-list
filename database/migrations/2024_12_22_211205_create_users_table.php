<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * ��������� ��������.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID ������������
            $table->string('name'); // ��� ������������
            $table->string('email')->unique(); // ����������� �����, ���������� ��� ������� ������������
            $table->string('password'); // ������
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
        Schema::dropIfExists('users');
    }
}
