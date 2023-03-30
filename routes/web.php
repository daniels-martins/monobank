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
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\BackAdminController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\PhotoController;

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

Route::get('/about', fn () =>  view('landing_pages.about'))->name('about');

Route::get('/student-loans', fn () =>  view('landing_pages.student_loans'))->name('student-loans');

Route::get('/mortgages', fn () =>  view('landing_pages.mortgages'))->name('mortgages');

Route::get('/credit-cards', fn () =>  view('landing_pages.credit_cards'))->name('credit-cards');

Route::get('/personal-loans', fn () =>  view('landing_pages.personal_loans'))->name('personal-loans');


Route::get('/thankyou', fn () =>  view('thankyou'))->name('thankyou');

// only auth users can view all the messages
Route::get('/contactmessage',  [ContactMessageController::class, 'index'])->middleware(['auth'])->name('contactmessages.index');

// only auth users can view the special page to create new contact message
Route::get('/contactmessage/create',  [ContactMessageController::class, 'create'])->middleware(['auth'])->name('contactmessages.create');

// any one should be able to send a message auth or not 
Route::post('/contactmessage',  [ContactMessageController::class, 'store'])->name('contactmessages.store');

Route::delete('/contactmessage/{contactMessage}',  [ContactMessageController::class, 'destroy'])->middleware(['auth'])->name('contactmessages.destroy');

Route::get('/sweet_alert',  [ContactMessageController::class, 'sweetAlert'])->middleware(['auth'])->name('sweet_alert');



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


// upload photo route
Route::get('/photo/create',  [PhotoController::class, 'create'])->middleware(['auth'])->name('photo.create');
Route::post('/photo/',  [PhotoController::class, 'store'])->middleware(['auth'])->name('photo.store');









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

   // Password Reset Routes
   Route::get('/password/edit/', [PasswordController::class, 'edit'])->middleware(['auth'])->name('password.edit');
   Route::patch('/password/', [PasswordController::class, 'update'])->middleware(['auth'])->name('new_password.update');
});



Route::get('/transactions', function () {
   // $all_trx = Payment::all();
   $all_trx = auth()->user()->trx();
   $allPendingTrx = $all_trx->where('status', 'pending');
   $allSuccessfulTrx = $all_trx->where('status', 'successful');
   $allFailedTrx = $all_trx->where('status', 'failed');
   $sendoffs = compact('all_trx', 'allPendingTrx', 'allSuccessfulTrx', 'allFailedTrx');
   // dd($all_trx, $allPendingTrx, $allSuccessfulTrx, $allFailedTrx);
   return (request()->caller == 'xxx-admin') ? view('admin.xxxadmin.transactions', $sendoffs) :  view('admin.transactions', $sendoffs);

   // return view('admin.transactions', compact('all_trx', 'allPendingTrx', 'allSuccessfulTrx', 'allFailedTrx'));
})->middleware(['auth'])->name('transactions.index');

Route::get('/tinker', function () {
   // foreach (Payment::all()->skip(10)->take(10) as $trx) {
   //    $trx->status = 'pending';
   //    $trx->save();
   //    echo $trx->status . '<Br>';
   // }

   // organiseTrxInDB(Payment::all());
   // xxx admin routes
   // return view('admin.tinker', compact('all_trx'));
})->middleware(['auth'])->name('tinker.index');

// Route::post('/backyard', [BackAdminController::class, 'index'])->middleware(['auth'])->name('backyard.index');


Route::get('xxx-admin', [BackAdminController::class, 'index'])->middleware(['auth'])->name('xxx-admin.index');
// deposit route
Route::get('xxx-admin/deposit', [DepositController::class, 'create'])->middleware(['auth'])->name('deposit.create');

Route::post('xxx-admin/deposit', [DepositController::class, 'store'])->middleware(['auth'])->name('deposit.store');
// account suspension route
Route::view('suspension', 'admin.accounts.suspension')->middleware(['auth'])->name('suspension');


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
