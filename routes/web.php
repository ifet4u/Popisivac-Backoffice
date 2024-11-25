<?php

use App\Models\PodesavanjaModel;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Home::class,'home'])->name('home');

Route::get('/podesavanja',\App\Livewire\Podesavanja::class)->name('podesavanja');
Route::get('/popis',\App\Livewire\Operacije\Popis::class)->name('popis');
Route::get('/popis/{id}',\App\Livewire\Operacije\Popis::class);

Route::get('/preuzmipopis/{id}',[\App\Http\Controllers\PopisIzvoz::class,'izvozCsv']);
Route::get('/emailpopis/{id}',[\App\Http\Controllers\PopisIzvoz::class,'izvozMail']);

Route::view('/test','test');
