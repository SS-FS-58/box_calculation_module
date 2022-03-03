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

Route::get('/', function () {
    return view('waleng');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/calculation','HomeController@storePackage')->name('calculation');

Route::get('/caihe','HomeController@showCaihe')->name('getcaihe');

Route::post('/caihe','HomeController@storeCaihe')->name('postcaihe'); 

Route::get('/huace','HomeController@showHuace')->name('gethuace');

Route::post('/huace','HomeController@storeHuace')->name('posthuace');

Route::get('/diaopai','HomeController@showDiaopai')->name('getdiaopai');

Route::post('/diaopai','HomeController@storeDiaopai')->name('postdiaopai');

Route::get('/taili','HomeController@showTaili')->name('gettaili');

Route::post('/taili','HomeController@storeTaili')->name('posttaili');

Route::get('/userbubble','HomeController@showUserBubble')->name('getuserbubble');

Route::post('/userbubble','HomeController@storeUserBubble')->name('postuserbubble');

Route::get('/userpoly','HomeController@showUserPoly')->name('getuserpoly');

Route::post('/userpoly','HomeController@storeUserPoly')->name('postuserpoly');

Route::get('/admin','HomeController@adminDashboard')->middleware('auth')->name('admin');

Route::get('/bubble','HomeController@showBubble')->middleware('auth')->name('getbubble');

Route::post('/bubble','HomeController@storeBubble')->middleware('auth')->name('postbubble');

Route::get('/poly','HomeController@showPoly')->middleware('auth')->name('getpoly');

Route::post('/poly','HomeController@storePoly')->middleware('auth')->name('postpoly');


Route::get('/paperbox','HomeController@showPaperbox')->middleware('auth')->name('getpaperbox');

Route::post('/paperbox','HomeController@storePaperbox')->middleware('auth')->name('postpaperbox');

Route::get('/mailerbox','HomeController@showMailerbox')->middleware('auth')->name('getmailerbox');

Route::post('/mailerbox','HomeController@storeMailerbox')->middleware('auth')->name('postmailerbox');
Route::get('/shippingbox','HomeController@showShippingbox')->middleware('auth')->name('getshippingbox');

Route::post('/shippingbox','HomeController@storeShippingbox')->middleware('auth')->name('postshippingbox');
Route::get('/rigidbox','HomeController@showRigidbox')->middleware('auth')->name('getrigidbox');

Route::post('/rigidbox','HomeController@storeRigidbox')->middleware('auth')->name('postrigidbox');


Route::get('/waleng','HomeController@showWaleng')->name('getwaleng');
Route::post('/waleng','HomeController@storeWaleng')->name('postwaleng');

//  backdesk setting forms

Route::post('/backdeskSettings/paperBox','BackdeskSettingsController@postPaperBox')->middleware('auth')->name('postpaperboxsettings');