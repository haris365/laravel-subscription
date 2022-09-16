<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subscription\SubscriptionController as AccountSubscriptionController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController;    
use App\Http\Controllers\Account\Subscriptions\SubscriptionController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCardController;
use App\Http\Controllers\Account\Subscriptions\CouponController;


use App\Http\Controllers\AccountController;
use App\Http\Controllers\Subscription\PlanController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [PlanController::class, 'home_index'])->name('home');


Route::group(['namespace' => 'Subscription'], function(){

    Route::get('/plans', [PlanController::class, 'index'])->name('subscriptions.plans');

    Route::get('/subscriptions', [AccountSubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('/subscriptions', [AccountSubscriptionController::class, 'store'])->name('subscriptions.store');

});

Route::group(['namespace' => 'Account', 'prefix' => 'account',], function(){

    Route::get('/', [AccountController::class, 'index'])->name('account');
    Route::group(['namespace' => 'Subscriptions', 'prefix' => 'subscriptions',], function(){

        Route::get('/', [SubscriptionController::class, 'index'])->name('account.subscriptions');
    
        Route::get('/cancel', [SubscriptionCancelController::class, 'index'])->name('account.subscriptions.cancel');
        Route::post('/cancel', [SubscriptionCancelController::class, 'store']);

        Route::get('/resume', [SubscriptionResumeController::class, 'index'])->name('account.subscriptions.resume');
        Route::post('/resume', [SubscriptionResumeController::class, 'store']);

        Route::get('/invoices', [SubscriptionInvoiceController::class, 'index'])->name('account.subscriptions.invoices');
        Route::get('/invoices/{id}', [SubscriptionInvoiceController::class, 'show'])->name('account.subscriptions.invoice');
    
        Route::get('/swap', [SubscriptionSwapController::class, 'index'])->name('account.subscriptions.swap');
        Route::post('/swap', [SubscriptionSwapController::class, 'store']);

        Route::get('/card', [SubscriptionCardController::class, 'index'])->name('account.subscriptions.card');
        Route::post('/card', [SubscriptionCardController::class, 'store']);

        Route::get('/coupon', [CouponController::class, 'index'])->name('account.subscriptions.coupon');
        Route::post('/coupon', [CouponController::class, 'store']);

        
    });

});

