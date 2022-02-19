<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Flights;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FlightsController;
use App\Http\Controllers\CruisesController;
use App\Http\Controllers\JetCharterController;
use App\Http\Controllers\YachtCharterController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\OtherController;
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

Route::get('/',                                     Flights::class)->name('home');

// Route::get('/flights/{area?}',                      Flights::class)->name('flights');
// Route::get('/flights/{area}/{country?}',            Flights::class)->name('flights.area');
// Route::get('/flights/{area}/{country}/{city?}',     Flights::class)->name('flights.city');

Route::get('/',                                     [FlightsController::class, 'home'])->name('home');
Route::get('/flights/{area?}',                      [FlightsController::class, 'index'])->name('flights');
Route::get('/flights/{area}/{country?}',            [FlightsController::class, 'area_index'])->name('flights.area');
Route::get('/flights/{area}/{country}/{city?}',     [FlightsController::class, 'city_index'])->name('flights.city');

Route::get('/cruises/{area?}',                      [CruisesController::class, 'index'])->name('cruises');
Route::get('/cruises/{area}/{country?}',            [CruisesController::class, 'area_index'])->name('cruises.area');
Route::get('/cruises/{area}/{country}/{city?}',     [CruisesController::class, 'city_index'])->name('cruises.city');

Route::get('/cars/{area?}',                         [CarsController::class, 'index'])->name('cars');
Route::get('/cars/{area}/{country?}',               [CarsController::class, 'area_index'])->name('cars.area');
Route::get('/cars/{area}/{country}/{city?}',        [CarsController::class, 'city_index'])->name('cars.city');

Route::get('/hotels',                               [HotelsController::class, 'index'])->name('hotels');
Route::post('/hotels/detail',                       [HotelsController::class, 'detail_index'])->name('hotels.detail');
Route::get('/hotels/search/hotel',                  [HotelsController::class, 'search_hotel'])->name('hotels.search');
Route::get('/hotels/search/{dest?}',                [HotelsController::class, 'search_dest'])->name('hotels.search_dest');

// Route::get('/hotels/{area?}',                       [HotelsController::class, 'index'])->name('hotels');
// Route::get('/hotels/{area}/{country?}',             [HotelsController::class, 'area_index'])->name('hotels.area');
// Route::get('/hotels/{area}/{country}/{city?}',      [HotelsController::class, 'city_index'])->name('hotels.city');


Route::get('/yacht-charter/{area?}',                [YachtCharterController::class, 'index'])->name('yachts');
Route::get('/jet-charter/{area?}',                  [JetCharterController::class, 'index'])->name('jets');

Route::get('/blog',                                 [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}',                            [BlogController::class, 'show'])->name('blog.show');

Route::get('/terms-of-service',                     [OtherController::class, 'terms'])->name('terms');
Route::get('/privacy-policy',                       [OtherController::class, 'policy'])->name('policy');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

