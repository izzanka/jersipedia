<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::group(['middleware'=>'HtmlMinifier'], function(){ 
 
    Auth::routes(['verify' => true]);

    Route::get('/cronjob',function(){
        Artisan::call('/checkorder');
    });
    
    Route::get('/','HomeController@index');
    Route::get('/jersey','JerseyController@index')->name('jersey');
    Route::get('/jersey/{jersey}', 'JerseyController@show')->name('jersey.detail');
    Route::get('/league/{league}','LeagueController@index')->name('league');
    
    Route::group(['middleware' => ['auth','verified']],function(){
    
        Route::get('/home', 'HomeController@index')->name('home');
        Route::post('/jersey/{jersey}','JerseyController@insert_cart')->name('insert.cart');
    
        Route::namespace('User')->group(function(){
    
            Route::view('/profile','user.profile')->name('profile');
            Route::put('/profile/update/{user}','ProfileController@update_profile')->name('profile.update');
            Route::put('/profile/update_password/{user}','ProfileController@update_password')->name('profile.update_password');
            Route::delete('/profile/delete/{user}','ProfileController@destroy')->name('profile.delete.account');
    
            Route::group(['middleware' => ['can:isUser']],function(){
    
                Route::get('/cart','CartController@index')->name('cart');
                Route::get('/cart/{orderdetail}/edit/{cond}','CartController@edit')->name('cart.edit');
    
                Route::get('/cart/checkout/{code}','CartController@checkout')->name('cart.checkout');
    
                //rajaongkir route
                Route::post('/cart/checkout/checkprice/{code}','CartController@check_price')->name('cart.check.price');
                Route::get('/cart/checkout/checkprice/getCity/ajax/{id}', 'CheckOutController@ajax');
    
                Route::post('/cart/checkout/shipping/{code}','CheckOutController@shipping')->name('checkout.shipping');
    
                Route::get('/cart/checkout/payment/{code}','PaymentController@index')->name('payment');
                Route::post('/cart/checkout/{code}','PaymentController@checkout')->name('checkout');
                Route::post('/cart/checkout/cancel/{code}','PaymentController@cancel')->name('checkout.cancel');
    
                Route::get('/history','HistoryController@index')->name('history');
                Route::get('/history/{code}/delete','HistoryController@destroy')->name('history.delete');
                
            });
    
        });
    
    });
    
    Route::group(['middleware' => ['auth','can:isAdmin']],function(){
        
        Route::namespace('Admin')->group(function(){
    
            Route::get('/order','OrderController@index')->name('order');
            Route::get('/order/confirm/{code}','OrderController@confirm')->name('order.confirm');
            
            Route::resource('jerseys','JerseyController');
            Route::get('/order-detail/{code}', 'OrderController@detail')->name('order.detail');
    
            Route::get('/order/export-excel','OrderController@export_excel')->name('order.export.excel');
        });
    
    });
  
});



