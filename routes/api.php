<?php

use App\Http\Controllers\RegistroController;
use App\Livewire\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('registro/sensores', [RegistroController::class, 'store']);