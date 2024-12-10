<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeAdminContoller;
use App\Http\Controllers\skillcontroller;
use App\Http\Controllers\sertifikatcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProjekController;

Route::get('/', [homecontroller::class, 'index']);

Route::resource('admskill',skillcontroller::class);
Route::resource('adm',HomeAdminContoller::class);
Route::resource('admsertif',sertifikatcontroller::class);
Route::resource('home',homecontroller::class);
Route::resource('pro',ProjekController::class);
