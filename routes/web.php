<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get("/join/{id}", [App\Http\Controllers\JoinController::class, 'join'])->name('join');
Route::post('/addmember', [App\Http\Controllers\JoinController::class, 'addmember'])->name('addmember');
Route::post('/updatemember', [App\Http\Controllers\JoinController::class, 'updatemember'])->name('updatemember');
Route::post('/joinus', [App\Http\Controllers\JoinController::class, 'joinus'])->name('joinus');
Route::get('/members', [App\Http\Controllers\JoinController::class, 'members'])->name('members');
Route::get('/geneology', [App\Http\Controllers\JoinController::class, 'geneology'])->name('geneology');
Route::get('/profile', [App\Http\Controllers\JoinController::class, 'profile'])->name('profile');
Route::get('/changepassword', [App\Http\Controllers\JoinController::class, 'changepassword'])->name('changepassword');

Route::get('/activate', [App\Http\Controllers\JoinController::class, 'activate'])->name('activate');

Route::get('/wallet/{from}/{to}', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
Route::post('/addwallet', [App\Http\Controllers\WalletController::class, 'addwallet'])->name('addwallet');
Route::post('/superadminaddwallet', [App\Http\Controllers\WalletController::class, 'superadminaddwallet'])->name('superadminaddwallet');
Route::get('/servicepaymentdelete/{id}', [App\Http\Controllers\WalletController::class, 'servicepaymentdelete'])->name('servicepaymentdelete');




