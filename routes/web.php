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

use App\User;

Route::get("/",function (){
    $user = factory(User::class)->create();
    $this->actingAs($user);
    dd($this->actingAs($user));
})->name("home");

Route::post('statuses','StatusesController@store')->name("statuses.store")->middleware('auth');

Route::auth();
