<?php
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */
Auth::routes();

//members

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'welcome'])->name('welcome');

Route::get('/members', [App\Http\Controllers\UsersController::class, 'members'])->name('members');
Route::post('/addmember', [App\Http\Controllers\UsersController::class, 'addmember'])->name('addmember');
Route::post('/updatemember', [App\Http\Controllers\UsersController::class, 'updatemember'])->name('updatemember');
Route::post('/checkemail', [App\Http\Controllers\UsersController::class, 'checkemail'])->name('checkemail');
Route::post('/checkeditemail', [App\Http\Controllers\UsersController::class, 'checkeditemail'])->name('checkeditemail');
//Purchase
Route::get('/purchase/{id}', [App\Http\Controllers\UsersController::class, 'purchase'])->name('purchase');

Route::post('/addproduct', [App\Http\Controllers\UsersController::class, 'addproduct'])->name('addproduct');

//withdraw

Route::get('/approvewithdraw', [App\Http\Controllers\WithdrawalController::class, 'approvewithdraw'])->name('approvewithdraw');
Route::post('/confirmwithdrawal', [App\Http\Controllers\WithdrawalController::class, 'confirmwithdrawal'])->name('confirmwithdrawal');


//Mobile
Route::get('walletdashboard', [App\Http\Controllers\Mobile\MobileController::class, 'walletdashboard'])->name('walletdashboard');
ROUTE::get('/walletlogin', [App\Http\Controllers\Mobile\MobileController::class, 'walletlogin'])->name('walletlogin');
ROUTE::get('/walletlogout', [App\Http\Controllers\Mobile\MobileController::class, 'walletlogout'])->name('walletlogout');
ROUTE::get('/requestamount', [App\Http\Controllers\Mobile\MobileWalletController::class, 'requestamount'])->name('requestamount');
ROUTE::get('/withdrawal', [App\Http\Controllers\Mobile\MobileWalletController::class, 'withdrawal'])->name('withdrawal');
ROUTE::post('/applywithdrawal', [App\Http\Controllers\Mobile\MobileWalletController::class, 'applywithdrawal'])->name('applywithdrawal');
ROUTE::get('/summary', [App\Http\Controllers\Mobile\MobileWalletController::class, 'summary'])->name('summary');
ROUTE::get('/passwordchange', [App\Http\Controllers\Mobile\MobileController::class, 'change'])->name('passwordchange');
ROUTE::post('/passwordupdate', [App\Http\Controllers\Mobile\MobileController::class, 'passwordupdate'])->name('passwordupdate');








Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get("/join/{id}", [App\Http\Controllers\JoinController::class, 'join'])->name('join');

Route::post('/joinus', [App\Http\Controllers\JoinController::class, 'joinus'])->name('joinus');
Route::get('/geneology', [App\Http\Controllers\JoinController::class, 'geneology'])->name('geneology');
Route::get('/todayjoined', [App\Http\Controllers\JoinController::class, 'todayjoinedmember'])->name('todayjoined');

Route::get('/changepassword', [App\Http\Controllers\JoinController::class, 'changepassword'])->name('changepassword');
Route::post('/updatepassword', [App\Http\Controllers\JoinController::class, 'updatepassword'])->name('updatepassword');

Route::get('/ownactivation/{referral_id}', [App\Http\Controllers\JoinController::class, 'ownactivation'])->name('ownactivation');

Route::get('/income', [App\Http\Controllers\JoinController::class, 'income'])->name('income');



Route::get('/wallet/{from}/{to}', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
Route::post('/addwallet', [App\Http\Controllers\WalletController::class, 'addwallet'])->name('addwallet');
Route::post('/superadminaddwallet', [App\Http\Controllers\WalletController::class, 'superadminaddwallet'])->name('superadminaddwallet');
Route::get('/servicepaymentdelete/{id}', [App\Http\Controllers\WalletController::class, 'servicepaymentdelete'])->name('servicepaymentdelete');
Route::get('/newrequest', [App\Http\Controllers\WalletController::class, 'newrequest'])->name('newrequest');
Route::get('/transactions', [App\Http\Controllers\WalletController::class, 'transactions'])->name('transactions');
//Route::get('/withdrawal', [App\Http\Controllers\WalletController::class, 'withdrawal'])->name('withdrawal');

Route::get('/transfer', [App\Http\Controllers\WalletController::class, 'transfer'])->name('transfer');
Route::get('/todayincome', [App\Http\Controllers\JoinController::class, 'todayincome'])->name('todayincome');
Route::get('/totalincome', [App\Http\Controllers\JoinController::class, 'totalincome'])->name('totalincome');
Route::post('/saverequest', [App\Http\Controllers\WalletController::class, 'saverequest'])->name('saverequest');
Route::get('/requestpayment', [App\Http\Controllers\WalletController::class, 'requestpayment'])->name('requestpayment');
Route::post('/paymentrequest', [App\Http\Controllers\WalletController::class, 'paymentrequest'])->name('paymentrequest');
Route::post('/approverequest_payment', [App\Http\Controllers\WalletController::class, 'approverequest_payment'])->name('approverequest_payment');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::post('/updateprofile', [App\Http\Controllers\ProfileController::class, 'updateprofile'])->name('updateprofile');

Route::get('/logout', [App\Http\Controllers\JoinController::class, 'logout'])->name('logout');


