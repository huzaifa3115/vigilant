<?php

use Illuminate\Support\Facades\Route;

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
//     return view('index');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');
Route::get('/disclaimer', [App\Http\Controllers\DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/pricing', [App\Http\Controllers\PricingController::class, 'index'])->name('pricing');
Route::get('/support', [App\Http\Controllers\SupportController::class, 'index'])->name('support');
Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/blogs/{blog}', [App\Http\Controllers\HomeController::class, 'blogDetail'])->name('blog-detail');
Route::get('/reviews', [App\Http\Controllers\HomeController::class, 'review'])->name('review');

Route::middleware(['auth'])->group(function () {
    Route::get('/refer', [App\Http\Controllers\ReferController::class, 'index'])->name('refer');
    Route::post('/refer', [App\Http\Controllers\ReferController::class, 'store'])->name('refer.store');
    Route::get('/checkout/{id}', [App\Http\Controllers\SubscriptionController::class, 'showSubscription'])->name('checkout');
});

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/subscribe', [App\Http\Controllers\SubscriptionController::class, 'showSubscription']);
Route::post('/subscribe', [App\Http\Controllers\SubscriptionController::class, 'processSubscription']);

Route::get('/discord', [App\Http\Controllers\SubscriptionController::class, 'discordLogin']);
Route::get('/discord-redirect', [App\Http\Controllers\SubscriptionController::class, 'handleProviderCallback']);

Route::get('/cronjob', [App\Http\Controllers\CornJobController::class, 'index'])->name('cron.job');
