<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    /**
     * Routes for resource company
     */
    $router->get('company', 'CompanyController@all');
    $router->get('company/{id}', 'CompanyController@get');

    /**
     * Routes for resource installer-company
     */
    $router->get('installer-company', 'InstallerCompanyController@all');
    $router->get('installer-company/{id}', 'InstallerCompanyController@get');

    /**
     * Routes for resource city
     */
    $router->get('city', 'CityController@all');
    $router->get('city/{id}', 'CityController@get');

    /**
     * Routes for resource role
     */
    $router->get('role', 'RoleController@all');
    $router->get('role/{id}', 'RoleController@get');

    /**
     * Routes for resource user-type
     */
    $router->get('user-type', 'UserTypeController@all');
    $router->get('user-type/{id}', 'UserTypeController@get');

    /**
     * Routes for resource user
     */
    $router->get('user', 'UserController@list');
    $router->get('user/{id}', 'UserController@get');
    $router->post('user', 'UserController@add');
    $router->put('user/{id}', 'UserController@put');
    $router->delete('user/{id}', 'UserController@remove');

    /**
     * Routes for resource department
     */
    $router->get('department', 'DepartmentController@all');
    $router->get('department/{id}', 'DepartmentController@get');
    $router->post('department', 'DepartmentController@add');
    $router->put('department/{id}', 'DepartmentController@put');
    $router->delete('department/{id}', 'DepartmentController@remove');

    /**
     * Routes for resource store
     */
    $router->get('store', 'StoreController@all');
    $router->get('store/{id}', 'StoreController@get');
    $router->post('store', 'StoreController@add');
    $router->put('store/{id}', 'StoreController@put');
    $router->delete('store/{id}', 'StoreController@remove');
});
