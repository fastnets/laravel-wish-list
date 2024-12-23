<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wish;

class UserAndWishSeeder extends Seeder
{
    public function run()
    {
        // Создаём пользователя
        $user = User::create([
            'name' => 'Иван Иванов',
            'email' => 'ivan@example.com',
            'password' => bcrypt('secret_password'),
        ]);

        // Создаём желание для этого пользователя
        Wish::create([
            'title' => 'Путешествие в Париж',
            'description' => 'Посетить Эйфелеву башню',
            'user_id' => $user->id, // Связываем с пользователем
        ]);
    }
}
