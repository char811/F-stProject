<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UsersController@getIndex');
Route::any('order', array('as' => 'order',
        'uses' => 'ServicesController@getOrder'
    ));

Route::post('form', array('as' => 'form',
        'uses' => 'UsersController@Recordic'
    ));
Route::any('service', array('as' => 'service',
        'uses' => 'OrdersController@getService'
    ));

Route::get('orders/index','ServicesController@getOrder');
Route::get('myadminroom/adminka', 'UsersController@Adminka');
Route::post('my', array('as' => 'my',
        'uses' => 'UsersController@postLogin'
    ));


Route::filter('ka', function()
{
   // if (Auth::guest()) return Redirect::guest('orders/index');
     if (!Auth::check()) return Redirect::to('/');
});

Route::group(array('before' => 'ka'), function ()
{

Route::get('myadminroom/index','OrdersController@getServ');
Route::get('myadminroom/orders','OrdersController@adminOrders');
Route::get('myadminroom/clients','OrdersController@adminClients');

 Route::post('newserv', array('as' => 'newserv',
        'uses' => 'ServicesController@store'
));

Route::post(
    'myadminroom/clients',
    array(
        'as' => 'myadminroom/clients',
        'uses' => 'UsersController@adminClients'
    )
);
Route::get('myadminroom/orders{ord}', array('as'=>'ad', 'uses'=> 'OrdersController@destroy'));
Route::get('services/index','ServicesController@create');
Route::get('process','OrdersController@getProcess');

Route::post('uniform',array('as' => 'uniform',
    'uses' => 'OrdersController@postSearch'
));

Route::any('uniform',array('as'=>'uniform', 'uses'=> 'OrdersController@postSearch'));

Route::post('exit', array('as'=>'exit', 'uses' => 'UsersController@getLogout'));

});

