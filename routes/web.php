<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get("/join/{id}", [App\Http\Controllers\JoinController::class, 'join'])->name('join');
Route::get('/addmember', [App\Http\Controllers\JoinController::class, 'addmember'])->name('addmember');
Route::post('/joinus', [App\Http\Controllers\JoinController::class, 'joinus'])->name('joinus');
Route::get('/members', [App\Http\Controllers\JoinController::class, 'members'])->name('members');
Route::get('/geneology', [App\Http\Controllers\JoinController::class, 'geneology'])->name('geneology');
Route::get('/profile', [App\Http\Controllers\JoinController::class, 'profile'])->name('profile');
Route::get('/changepassword', [App\Http\Controllers\JoinController::class, 'changepassword'])->name('changepassword');




