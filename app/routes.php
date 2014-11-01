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

Route::get('myadminroom/orders',array('as'=>'myadminroom/orders', 'uses'=> 'OrdersController@adminOrders'));
Route::get('myadminroom/clients',array('as'=>'clients', 'uses'=>'OrdersController@adminClients'));

Route::get('myadminroom/orders/delete', array('as'=>'orderdelete', 'uses'=> 'OrdersController@orderDestroy'));
Route::get('myadminroom/clients{client}', array('as'=>'clientdelete', function($client){
    $kza = User::where('id','=', $client)->delete();
    return Redirect::back();
}));
Route::get('myadminroom/orders/{id}', array('as'=>'sortorder', 'uses'=> 'OrdersController@adminOrders'));
Route::get('myadminroom/clients{id}', array('as'=>'sortclient', 'uses'=> 'OrdersController@adminClients'));

Route::post('myadminroom/orderchange', array('as'=>'orderchange', 'uses'=>'OrdersController@orderChange'));
Route::post('myadminroom/clientchange', array('as'=>'clientchange', 'uses'=>'OrdersController@clientChange'));

Route::post('myadminroom/orders{modelorder}', array('as' => 'myadminroom/orders',
   'uses' => 'OrdersController@postorderChange'
));
Route::post('myadminroom/clients{model}', array('as' => 'myadminroom/clients',
    'uses' => 'OrdersController@postclientChange'
));

    Route::any('search', function() {
        $term=Request::get('term');
        $users = User::where('email','LIKE', '%' . $term . '%')->take(10)->get();
        $response = array(
           "suggestions"=>array()
        );
        foreach ($users as $user) {
            array_push($response["suggestions"], array("value" => $user->email, "data"=>$user->mobile));
        }

        return Response::json($response);
    });

    Route::any('mysearch', array('uses'=>'OrdersController@myajaxsearch'));
});

