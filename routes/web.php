<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('main');
});

/*

Route::get('/aluno', function () {
    // return "<h3>Olá Mundo! Olá Laravel Também.</h3>";
    return view('aluno.list'); // -> A View é a parte que o usuário vê e interage.
});

*/

Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/create', [AlunoController::class, 'create']);
Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
