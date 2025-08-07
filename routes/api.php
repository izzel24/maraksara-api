<?php

use App\Http\Controllers\AksaraBatakController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('api')->group(function () {
Route::get('/translits/{dialect}',[AksaraBatakController::class, 'getByDialect']);
Route::post('/quiz/start', [QuizController::class, 'startQuiz']);
Route::post('/quiz/{sessionToken}/submit', [QuizController::class, 'submitAnswer']);
Route::post('/quiz/{sessionToken}/finish', [QuizController::class, 'finish']);
Route::post('/quiz/{sessionToken}/end', [QuizController::class, 'endQuiz']);
Route::get('/quiz/{token}/next', [QuizController::class, 'getNextQuestion']);
Route::get('/diacritics', [AksaraBatakController::class, 'getDiacritics']);
});
