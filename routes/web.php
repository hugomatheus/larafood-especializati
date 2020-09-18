<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // Routes Module x Permission

    Route::get('modules/{id}/permissions', 'ACL\ModulePermissionController@permissions')->name('modules.permissions');

    // Routes Permissions

    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    // Routes Modules

    Route::any('modules/search', 'ACL\ModuleController@search')->name('modules.search');
    Route::resource('modules', 'ACL\ModuleController');

    // Routes Details Plan

    Route::resource('plans.details', 'DetailPlanController');

    // Routes Plans

    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::resource('plans', 'PlanController');


});




Route::get('/', function () {
    return view('welcome');
});
