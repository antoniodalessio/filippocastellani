<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'DashboardController@index')->name('admin.home');

    Route::group([], function ($router) {
        $router->resource('/menu', 'MenuController');
        $router->resource('/page', 'PageController');
        $router->resource('/project', 'ProjectsController');
        $router->resource('/template', 'TemplatesController');
        $router->resource('/langs', 'LangsController');
        //$router->resource('/settings', 'SettingsController');
    });

});