<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableCollation extends Migration
{
    public function up()
    {
        // ��������� ��������� �������
        DB::statement('ALTER TABLE users CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    public function down()
    {
        // ���� ����� �������� ��������, ���������� ����� ������ ��������� (��������, utf8_general_ci)
        DB::statement('ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
    }
}
