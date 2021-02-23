<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateJwt;

Route::post('login', 'Auth\AuthController@login');

Route::group(['middleware' => AuthenticateJwt::class], function () use ($router) {
    $router->post('transfer', 'Fund\FundTransferController@send');
});