<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wish;

class UserAndWishSeeder extends Seeder
{
    public function run()
    {
        // ������ ������������
        $user = User::create([
            'name' => '���� ������',
            'email' => 'ivan@example.com',
            'password' => bcrypt('secret_password'),
        ]);

        // ������ ������� ��� ����� ������������
        Wish::create([
            'title' => '����������� � �����',
            'description' => '�������� �������� �����',
            'user_id' => $user->id, // ��������� � �������������
        ]);
    }
}
