<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-agent', [AgentController::class, 'create'])->name('agents.create');
Route::post('/create-agent', [AgentController::class, 'store'])->name('agents.store');

Route::get('/create-property', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/create-property', [PropertyController::class, 'store'])->name('properties.store');