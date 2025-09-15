<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PersonController; // Add this line

// --- Project Routes ---
Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects/{project}/links', [ProjectController::class, 'storeLink'])->name('projects.links.store');

// --- NEW Person & Assignment Routes ---
Route::post('/projects/{project}/people', [ProjectController::class, 'assignPerson'])->name('projects.people.assign');

Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');