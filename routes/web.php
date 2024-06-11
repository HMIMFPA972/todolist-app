<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get(
//     '/',
// function () {
//     return view('home');
// }
// );

// Route pour l'affichage de la base de données
Route::get('/', [TaskController::class, 'index']);

// Route de l'ajout d'une tâche
Route::post('/add', [TaskController::class, 'create'])->name('add');

// Route pour mettre à jour d'une tâche
Route::get('/upd/{id}', [TaskController::class, 'update'])->name('upd');

// Route pour mettre à jour d'une tâche
Route::get('/del/{id}', [TaskController::class, 'delete'])->name('del');
