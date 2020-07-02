<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('surah/{id}', 'API\DataController@getSurahAndAyat');
Route::get('surah-badge/{id}', 'API\DataController@getSurahBadge');
Route::get('surah-audio', 'API\DataController@getAllAudioSurah');
Route::get('surah-audio/{id}', 'API\DataController@getAudioBySurah');

Route::post('login', 'API\AuthController@login');
Route::post('login-google', 'API\AuthController@loginProvider');
Route::post('register', 'API\AuthController@register');
Route::get('username/{username}', 'API\AuthController@checkUsername');

Route::get('download-audio/{file}', 'API\MediaController@downloadAudio')->middleware('throttle:60,1');

Route::get('download-video/{file}', 'API\MediaController@downloadVideo');

Route::get('challenge', 'API\ChallengeController@getChallenge');
Route::get('challenge-daily', 'API\ChallengeController@getDailyChallenge');




Route::group(['middleware' => ['auth:api']],  function () {

    Route::post('challenge-join', 'API\ChallengeController@joinChallenge');
    Route::post('challenge-done', 'API\ChallengeController@afterChallenge');
    Route::post('audio-history', 'API\PlayListController@recapHistory');

    Route::get('user', 'API\AuthController@getUserData');
    Route::put('user', 'API\AuthController@getUserData');

    
    Route::get('rank', 'API\AuthController@getRank');

    Route::get('challenge', 'API\ChallengeController@getChallenge');
    Route::get('challenge-daily', 'API\ChallengeController@getDailyChallenge');

    Route::get('history', 'API\HistoryController@getAllHistory');

    Route::get('quote', 'API\DataController@getQuote');
});
