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

Route::get('admin', 'UsersController@Adminka');
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

 Route::get('process','OrdersController@getProcess');


 Route::post('services/index', array('as' => 'services/index',
        'uses' => 'ServicesController@store'
));

Route::get('services/index','ServicesController@create');


Route::post('exit', array('as'=>'exit', 'uses' => 'UsersController@getLogout'));

Route::get('myadminroom/adminRecord', 'OrdersController@adminRecord');
Route::get('myadminroom/adminorderRecord', 'OrdersController@adminorderRecord');

Route::post('record', array('as' => 'record',
        'uses' => 'UsersController@myRecord'
));
Route::post('recorder', array('as' => 'recorder',
        'uses' => 'UsersController@myorderRecord'
));


Route::post(
        'myadminroom/clients',
        array(
            'as' => 'myadminroom/clients',
            'uses' => 'UsersController@adminClients'
        )
);

Route::any('myadminroom/orders','OrdersController@adminOrders');
Route::any('myadminroom/clients','OrdersController@adminClients');

Route::get('myadminroom/orders{ord}', array('as'=>'orderdelete', 'uses'=> 'OrdersController@orderDestroy'));
Route::get('myadminroom/clients{client}', array('as'=>'clientdelete', 'uses'=> 'OrdersController@clientDestroy'));
Route::get('myadminroom/orders{id}', array('as'=>'sortorder', 'uses'=> 'OrdersController@adminOrders'));
Route::get('myadminroom/clients{id}', array('as'=>'sortclient', 'uses'=> 'OrdersController@adminClients'));

Route::post('myadminroom/orderchange', array('as'=>'orderchange', 'uses'=>'OrdersController@orderChange'));
Route::post('myadminroom/clientchange', array('as'=>'clientchange', 'uses'=>'OrdersController@clientChange'));

Route::post('myadminroom/orders{modelorder}', array('as' => 'myadminroom/orders',
    'uses' => 'OrdersController@postorderChange'
));
Route::post('myadminroom/clients{model}', array('as' => 'myadminroom/clients',
    'uses' => 'OrdersController@postclientChange'
));
});

