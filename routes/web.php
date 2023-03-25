<?php

use App\Models\Aza;
use App\Models\Payment;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () =>  view('welcome'))->name('welcome');

Route::get('/dashboard',  fn () => view('admin.index'))->middleware(['auth'])->name('dashboard');

// cards

Route::get('/cards', [CardController::class, 'index'])->middleware(['auth'])->name('cards.index');

Route::get('/cards/create', [CardController::class, 'create'])->middleware(['auth'])->name('cards.create');

Route::get('/cards/{card}', [CardController::class, 'show'])->middleware(['auth'])->name('cards.show');

Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->middleware(['auth'])->name('cards.edit');

Route::patch('/cards/{card}', [CardController::class, 'update'])->middleware(['auth'])->name('cards.update');

Route::post('/cards/store', [CardController::class, 'store'])->middleware(['auth'])->name('cards.store');

Route::delete('/cards/{card}', [CardController::class, 'destroy'])->middleware(['auth'])->name('cards.destroy');

// 

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');

Route::get('/profile/edit/', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');

Route::patch('/profile/{id}', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.update');


// deposit route
Route::get('/deposit', [DepositController::class, 'create'])->middleware(['auth'])->name('depsit.create');

Route::post('/deposit', [DepositController::class, 'store'])->middleware(['auth'])->name('depsit.store');


// Route::get('/accounts', [AzaController::class, 'index'])->middleware(['auth'])->name('accounts.index');

// Route::get('/accounts/create', [AzaController::class, 'create'])->middleware(['auth'])->name('accounts.create');

// Route::post('/accounts', [AzaController::class, 'store'])->middleware(['auth'])->name('accounts.store');

// Route::get('/accounts/{aza}', [AzaController::class, 'edit'])->middleware(['auth'])->name('accounts.edit');

// Route::patch('/accounts/{aza}', [AzaController::class, 'update'])->middleware(['auth'])->name('accounts.update');

// Route::delete('/accounts/{aza}', [AzaController::class, 'destroy'])->middleware(['auth'])->name('accounts.destroy');





/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
   Route::resources([
      // 'plural form of resouce' => ControllerForResource
      'payments' => PaymentController::class,
      'accounts' => AzaController::class,

   ]);
});

Route::get('/transactions', function () {
   $all_trx = Payment::all();
   return view('admin.transactions', compact('all_trx'));
})->middleware(['auth'])->name('transactions.index');

// Route::get('/transactions/create', function () {

//    return view('admin.payments.create');



// })->middleware(['auth'])->name('transactions.create');

require __DIR__ . '/auth.php';
