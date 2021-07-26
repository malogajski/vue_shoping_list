<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Items
    Route::resource('items', 'ItemsApiController');

    // Stores
    Route::resource('stores', 'StoresApiController');

    // Orders
    Route::resource('orders', 'OrdersApiController');

    // Main Report
    Route::apiResource('main-reports', 'MainReportApiController', ['only' => ['index']]);

    // Order Items
    Route::resource('order-items', 'OrderItemsApiController');
});
