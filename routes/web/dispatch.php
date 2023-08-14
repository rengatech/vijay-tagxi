<?php

use Illuminate\Support\Facades\Route;
use App\Base\Constants\Auth\Role;
use App\Http\Controllers\Api\v1\Dispatcher\DispatcherController;

Route::middleware('auth:web')->group(function () {
    Route::middleware(role_middleware(Role::DISPATCHER))->group(function () {
    });

    Route::namespace('Dispatcher')->group(function () {
        Route::get('dispatch/dashboard', 'DispatcherController@dashboard');
        Route::get('fetch/booking-screen/{modal}', 'DispatcherController@fetchBookingScreen');

        Route::post('request/create', 'DispatcherCreateRequestController@createRequest');

        Route::get('fetch/request_lists', 'DispatcherController@fetchRequestLists');

        Route::get('request/detail_view/{requestmodel}','DispatcherController@requestDetailedView')->name('dispatcherRequestDetailView');


        Route::get('dispatch/profile', 'DispatcherController@profile')->name('dispatcherProfile');
        Route::get('dispatch/book-now', 'DispatcherController@bookNow');
    });
});

