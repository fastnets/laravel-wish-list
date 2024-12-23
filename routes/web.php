<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishController; // Подключение WishController
use App\Http\Controllers\UserController; // Подключение UserController
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Здесь вы регистрируете маршруты для вашего приложения. Все маршруты
| загружаются через RouteServiceProvider и будут использоваться в группе
| middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Маршруты для профиля
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Маршруты для желаний (Wish)
    Route::resource('wishes', WishController::class);

    // Маршрут для отображения списка пользователей
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
