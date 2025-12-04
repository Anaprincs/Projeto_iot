<?php


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\Ambientelist;
use App\Livewire\Auth\Login;
use App\Models\Ambiente;
use Illuminate\Support\Facades\Route;

Route::get('ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');
Route::get('ambiente/index', Ambientelist::class)->name('ambiente.index');

use App\Livewire\Dashboard;

use App\Livewire\Registro\RegistroIndex;

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorIndex;
use App\Models\Sensor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


Route::get('registro/index', RegistroIndex::class)->middleware('auth', 'user_type:user');

Route::get('sensor/create', SensorCreate::class)->name('sensor.create')->middleware('auth', 'user_type:user');
Route::get('sensor/index',SensorIndex::class)->name('sensor.index')->middleware('auth', 'user_type:user');
Route::get('sensor/edit/{id}',SensorEdit::class)->name('sensor.edit')->middleware('auth', 'user_type:user');

Route::get('/', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth', 'user_type:user');



