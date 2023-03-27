<?php

use App\Models\Aza;
use App\Models\Payment;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzaController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactMessageController;

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
Route::get('/thankyou', fn () =>  view('welcome'))->name('thankyou');

// any one should be able to send a message auth or not 
Route::post('/contactmessage',  [ContactMessageController::class, 'store'])->name('contactmessages.store');

// only auth users can view all the messages and delete any message
Route::get('/contactmessage',  [ContactMessageController::class, 'index'])->middleware(['auth'])->name('contactmessages.index');

Route::delete('/contactmessage/{contactMessage}',  [ContactMessageController::class, 'destroy'])->middleware(['auth'])->name('contactmessages.destroy');

Route::get('/clear_all', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";
});


// for running artisan commands
Route::get('/artie/{cmd}', function () {
   try {
      $result = Artisan::call(request()->cmd, ['--force' => true]);
   } catch (\Throwable $th) {
      dd('Oops! Error occured ', $th->getMessage());
   }
   dd('The [' . request()->cmd . '] Artisan command was successful : ' . $result);
})->name('artisan');

Route::get('/dashboard',  function () {

   return view('admin.index');
})->middleware(['auth'])->name('dashboard');

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
Route::get('/deposit', [DepositController::class, 'create'])->middleware(['auth'])->name('deposit.create');

Route::post('/deposit', [DepositController::class, 'store'])->middleware(['auth'])->name('deposit.store');


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
   $allPendingTrx = Payment::where('status', 'pending')->get();
   $allSuccessfulTrx = Payment::where('status', 'successful')->get();
   $allFailedTrx = Payment::where('status', 'failed')->get();
   return view('admin.transactions', compact('all_trx', 'allPendingTrx', 'allSuccessfulTrx', 'allFailedTrx'));
})->middleware(['auth'])->name('transactions.index');

Route::get('/tinker', function () {
   // foreach (Payment::all()->skip(10)->take(10) as $trx) {
   //    $trx->status = 'pending';
   //    $trx->save();
   //    echo $trx->status . '<Br>';
   // }

   // organiseTrxInDB(Payment::all());
   // return view('admin.tinker', compact('all_trx'));
})->middleware(['auth'])->name('tinker.index');

require __DIR__ . '/auth.php';


function organiseTrxInDB($all_trx)
{
   foreach ($all_trx as $key => $trx) {
      if (trim($trx->receiver) == 'Webdev587' and trim($trx->sender) == 'Webdev587') {
         // echo $trx->receiver, '<br>';
         $trx->receiver_id = $trx->sender_id;
         print('okay');
      }
      $trx->sender = trim($trx->sender);
      $trx->receiver = trim($trx->receiver);
      echo 'last line', $trx->receiver_id, $trx->receiver, '<br><br><br>';
      $trx->save();
   }
}
