<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::resource('plans', 'PlanController');
});




Route::get('/', function () {
    return view('welcome');
});
