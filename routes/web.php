<?php



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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template/app');
});

Route::get('/admin', 'AdminController@index');

Auth::routes();

Route::resource('surat', 'BackOffice\SurahController')->except(['show']);
Route::resource('ayat', 'BackOffice\AyatController')->except(['show']);
Route::resource('quote', 'BackOffice\QuoteController')->except(['show']);
Route::resource('challenge', 'BackOffice\ChallengeController')->except(['show']);
Route::resource('progress', 'BackOffice\ProgressController')->except(['show']);
Route::resource('task', 'BackOffice\TaskController')->except(['show']);
Route::resource('user', 'BackOffice\UserController')->except(['show']);
Route::resource('audio', 'BackOffice\AudioController')->except(['show']);
Route::resource('video', 'BackOffice\VideoController')->except(['show']);


Route::get('/surat-data', 'BackOffice\SurahController@getData');
Route::get('/ayat-data', 'BackOffice\AyatController@getData');
Route::get('/user-data', 'BackOffice\UserController@getData');
Route::get('/quote-data', 'BackOffice\QuoteController@getData');

Route::get('/audio-data', 'BackOffice\AudioController@getData');
Route::get('/video-data', 'BackOffice\VideoController@getData');
