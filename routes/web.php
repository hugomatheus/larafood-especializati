<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    // Routes Role x User

    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::post('users/{id}/roles/store', 'ACL\RoleUserController@attachRoleUser')->name('users.roles.attach');
    Route::get('users/{id}/roles/{roleId}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.roles.detach');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');

    // Routes Role x Permission

    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::post('roles/{id}/permissions/store', 'ACL\PermissionRoleController@attachPermissionRole')->name('roles.permissions.attach');
    Route::get('roles/{id}/permissions/{permissionId}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permissions.detach');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');

    // Routes Roles

    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');

    // Routes Tenants

    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');

    // Routes Table

    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');

    // Routes Category x Product

    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');


    // Routes Product x Category

    Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::post('products/{id}/categories/store', 'CategoryProductController@attachProductCategory')->name('products.categories.attach');
    Route::get('products/{id}/categories/{categoryId}/detach', 'CategoryProductController@detachProductCategory')->name('products.categories.detach');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');


    // Routes Products

    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    // Routes Categories

    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    // Routes Users

    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    // Routes Module x Plan

    Route::get('modules/{id}/plans', 'ACL\ModulePlanController@plans')->name('modules.plans');


    // Routes Plan x Module

    Route::any('plans/{id}/modules/create', 'ACL\ModulePlanController@modulesAvailable')->name('plans.modules.available');
    Route::post('plans/{id}/modules/store', 'ACL\ModulePlanController@attachModulePlan')->name('plans.modules.attach');
    Route::get('plans/{id}/modules/{moduleId}/detach', 'ACL\ModulePlanController@detachModulePlan')->name('plans.modules.detach');
    Route::get('plans/{id}/modules', 'ACL\ModulePlanController@modules')->name('plans.modules');


    // Routes Permission x Module

    Route::get('permissions/{id}/modules', 'ACL\ModulePermissionController@modules')->name('permissions.modules');


    // Routes Module x Permission

    Route::any('modules/{id}/permissions/create', 'ACL\ModulePermissionController@permissionsAvailable')->name('modules.permissions.available');
    Route::post('modules/{id}/permissions/store', 'ACL\ModulePermissionController@attachModulePermission')->name('modules.permissions.attach');
    Route::get('modules/{id}/permissions/{permissionId}/detach', 'ACL\ModulePermissionController@detachModulePermission')->name('modules.permissions.detach');
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

    // Route Admin (/admin)
    Route::get('/', 'UserController@index');

    // Route Tests
    Route::get('test-acl', function(){
        $result = auth()->user()->getUserPermissions();
        dd($result);
    });


});


// Route Site

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@index')->name('site.home');
    Route::get('/plan/{url}', 'SiteController@choicePlanSubscription')->name('plan.subscription');
});



// Route Auth

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });




// Auth::routes([
//     'register' => false, // Desabilita o registro
//     'reset' => false, // Desabilita o reset da senha
//     'verify' => false, // Desabilita a verificação de e-mail
//   ]);
