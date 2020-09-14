<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // Routes Details Plan

    Route::resource('plans.details', 'DetailPlanController');

    // Routes Plans

    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::resource('plans', 'PlanController');


});




Route::get('/', function () {
    return view('welcome');
});
