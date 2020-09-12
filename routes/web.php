<?php


Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::delete('admin/plans/{id}', 'Admin\PlanController@destroy')->name('plans.destroy');

Route::get('/', function () {
    return view('welcome');
});
