<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;


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

Route::get('/loc', function () {


    return auth('api')->user()->school_id;

//    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
//        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
//            return 0;
//        }
//        else {
//            $theta = $lon1 - $lon2;
//            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
//            $dist = acos($dist);
//            $dist = rad2deg($dist);
//            $miles = $dist * 60 * 1.1515;
//            $unit = strtoupper($unit);
//
//            if ($unit == "K") {
//                return ($miles * 1.609344*1000);
//            } else if ($unit == "N") {
//                return ($miles * 0.8684);
//            } else {
//                return $miles*.000621371192;
//            }
//        }
//    }
//      $kmdistance=distance(31.5154801,  34.4520459, 31.5152232, 34.4499518,'k');
//
//    return (int)$kmdistance/80;


});



Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('/login', 'AdminController@ShowformLogin')->name('admin.login');
    Route::POST('/adminlogin', 'AdminController@adminLogin')->name('admin.login.lo');
    Route::post('/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/index', 'AdminController@index');
    Route::get('/policy', 'PolicyController@index');
    Route::post('/Changeinfo', 'PolicyController@update');
    Route::get('/service', 'ServiceyController@index');
    Route::get('/Mechanism', 'MechanismController@index');
    Route::get('/City', 'CityController@index');
    Route::post('/storecity', 'CityController@store')->name('storecity');
    Route::get('/deletecity/{id}', 'CityController@destroy')->name('deletecity');
    Route::post('/edicity/{id}', 'CityController@update')->name('edicity');
    Route::get('/account', 'AdminController@account');
    Route::post('/account', 'AdminController@account');


    



    


    
 });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
