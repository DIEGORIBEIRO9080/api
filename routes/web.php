<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 

#Route::get('/',[UserController::class,'index'])->name('user.index');
#Route::get('show/{user}',[UserController::class,'show'])->name('user.show');
#Route::get('/create-user',[UserController::class,'create'])->name('user.create');
#Route::post('/store-user',[UserController::class,'store'])->name('user-store');
#Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
#Route::put('/update-user/{user}',[UserController::class, 'update'])->name('user-update');
#Route::delete('/destroi-user/{user}',[UserController::class,'destroy'])->name('user.destroy');



#Route::prefix('users')->group(function () {
    #Route::get('/', [UserController::class, 'index']); // Listar usuários
    #Route::post('/', [UserController::class, 'store']); // Criar novo usuário
    #Route::get('/{id}', [UserController::class, 'show']); // Exibir usuário
    #Route::put('/{id}', [UserController::class, 'update']); // Atualizar usuário
    #Route::delete('/{id}', [UserController::class, 'destroy']); // Deletar usuário
#});


// Rota para listar todos os usuários
Route::get('/', [UserController::class, 'index'])->name('user.index');

// Rota para exibir um usuário específico
Route::get('show/{user}', [UserController::class, 'show'])->name('user.show');

// Rota para mostrar o formulário de criação de usuário
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');

// Rota para cadastrar um novo usuário
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');

// Rota para exibir o formulário de edição de um usuário
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');

// Rota para atualizar um usuário existente
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user-update');

// Rota para deletar um usuário
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
