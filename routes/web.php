<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\MakePaymentController;
use App\Http\Controllers\Mojaloop;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('kutayarisha/v1')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register');


    Route::get('/forgot-password', [
        AuthController::class,
        'forgot_password',
    ])->name('forgot-password');

    Route::get('/password-reset', [
        AuthController::class,
        'password_reset',
    ])->name('password-reset');

    Route::get('/confirm/{email}',[AuthController::class, 'confirm_email'])->name('confirm');
    Route::post('/confirm/{email}',[AuthController::class, 'confirm_email'])->name('confirm');

    Route::get('/welcome',[WelcomeController::class, 'welcome'])->name('welcome');
});

Route::get('/', function () {
    return redirect()->route('welcome');
});



Route::middleware(['web', 'auth'])
    ->prefix('kutayarisha/v1')
    ->group(function () {
        //redirect to dashboard
        Route::get('/admin', [DashBoardController::class, 'index'])->name(
            'admin'
        );
        //redirect to dashboard
        Route::post('/logout', [AuthController::class, 'logout'])->name(
            'logout'
        );
        //pricing
        Route::get('/pricing', [PricingController::class, 'index'])->name(
            'pricing'
        );
        //subscription
        Route::get('/subscription/{package}', [PricingController::class, 'subscription'])->name(
            'subscription'
        ); 
        //
        Route::post('/payment', [MakePaymentController::class, 'make_payment'])->name(
            'payment'
        );  

         //payment resource
         Route::resource('payments', MakePaymentController::class);

        //users
        Route::resource('users', UserController::class);
        //mojaloop resource
        Route::resource('mojaloop', Mojaloop::class);
        //loop up
        // Route::get('/mojaloop/lookUp', [Mojaloop::class, 'lookUp'])->name(
        //     'lookUp'
        // );
        //comments
        Route::resource('comments', CommentController::class);
        Route::get('comments/approve/{id}', [CommentController::class, 'approve'])->name('comments.approve');

        Route::resource('products', CommentController::class);


    });
