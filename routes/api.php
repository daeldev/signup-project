<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::post('/client/register', [ClientController::class, 'registerClient']);
