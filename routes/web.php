<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Models\Ambiente;
use Illuminate\Support\Facades\Route;

Route::get('ambiente/create', AmbienteCreate::class);
