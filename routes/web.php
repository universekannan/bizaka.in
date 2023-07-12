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
Route::get('/activate/{referral_id}', [App\Http\Controllers\JoinController::class, 'activate'])->name('activate');
Route::get('/income', [App\Http\Controllers\JoinController::class, 'income'])->name('income');


Route::get('/wallet/{from}/{to}', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
Route::post('/addwallet', [App\Http\Controllers\WalletController::class, 'addwallet'])->name('addwallet');
Route::post('/superadminaddwallet', [App\Http\Controllers\WalletController::class, 'superadminaddwallet'])->name('superadminaddwallet');
Route::get('/servicepaymentdelete/{id}', [App\Http\Controllers\WalletController::class, 'servicepaymentdelete'])->name('servicepaymentdelete');
Route::get('/newrequest', [App\Http\Controllers\WalletController::class, 'newrequest'])->name('newrequest');
Route::get('/transactions', [App\Http\Controllers\WalletController::class, 'transactions'])->name('transactions');
Route::get('/withdrawal', [App\Http\Controllers\WalletController::class, 'withdrawal'])->name('withdrawal');

Route::get('/transfer', [App\Http\Controllers\WalletController::class, 'transfer'])->name('transfer');
Route::get('/todayincome', [App\Http\Controllers\JoinController::class, 'todayincome'])->name('todayincome');
Route::get('/totalincome', [App\Http\Controllers\JoinController::class, 'totalincome'])->name('totalincome');

