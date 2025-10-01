<?php

use App\Livewire\Dashboard;
use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorIndex;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;


Route::get('/', Dashboard::class);
Route::get('sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('sensor/index',SensorIndex::class)->name('sensor.index');
Route::get('sensor/edit/{id}',SensorEdit::class)->name('sensor.edit');
