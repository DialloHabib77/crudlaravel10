<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ClasseController;

Route::get('/', [EtudiantController::class, 'index'] )->name('welcome');

//Pour l'étudiant

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');

Route::get('/etudiants/export', [EtudiantController::class, 'export'])->name('etudiants.export');
Route::post('/etudiants/import', [EtudiantController::class, 'import'])->name('etudiants.import');
//Pour la classe

Route::get('/classes', [ClasseController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClasseController::class, 'create'])->name('classes.create');
Route::post('/classes', [ClasseController::class, 'store'])->name('classes.store');
Route::get('/classes/{classe}', [ClasseController::class, 'show'])->name('classes.show');
Route::get('/classes/{classe}/edit', [ClasseController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{classe}', [ClasseController::class, 'update'])->name('classes.update');
Route::delete('/classes/{classe}', [ClasseController::class, 'destroy'])->name('classes.destroy');

