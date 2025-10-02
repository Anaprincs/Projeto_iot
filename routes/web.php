<?php


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\Ambientelist;
use App\Models\Ambiente;
use Illuminate\Support\Facades\Route;

Route::get('ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');
Route::get('ambiente/index', Ambientelist::class)->name('ambiente.index');

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

