<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/services', App\Http\Controllers\ServicesController::class);
Route::resource('/about', App\Http\Controllers\AboutController::class);
Route::resource('/contact', App\Http\Controllers\ContactController::class);
Route::resource('/admin', App\Http\Controllers\AdminController::class);
route::resource('/hero', App\Http\Controllers\HeroController::class);
Route::resource('/doctors', App\Http\Controllers\DoctorsController::class);
Route::resource('clients', App\Http\Controllers\ClientsController::class);
Route::patch('/clients/{id}/toggle-status', [ClientsController::class, 'toggleStatus'])->name('clients.toggleStatus');
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::post('/schedules/service', [App\Http\Controllers\ScheduleServiceController::class, 'store'])->name('schedules.service.store');
Route::get('/laporan', [LaporanController::class,'lap_service_schedule_index'])->name('laporan.service-schedule');
Route::get('/print-service-schedule/{pilihan}', [LaporanController::class,'lap_service_schedule'])->name('print.service-schedule');