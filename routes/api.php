<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;


Route::get('/properties', [PropertyController::class, 'index']);

Route::get('/properties/{id}', [PropertyController::class, 'show']);

Route::post('/properties', [PropertyController::class, 'store']);


Route::get('/agents', [AgentController::class, 'index']);

Route::get('/agents/{id}', [AgentController::class, 'show']);

Route::post('/agents', [AgentController::class, 'store']);
