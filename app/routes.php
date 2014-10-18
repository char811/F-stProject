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

/*Route::get('/users', function()
{
	return View::make('users.register');
});


Route::get('users.register', 'UsersController@getRegister');

Route::get('/', 'UsersController@getLogin');

Route::post('form', array('as' => 'form',
        'uses' => 'UsersController@postLogin'
    ));
Route::controller('password', 'RemindersController');
	<td>{{ Form::open(array('method' => 'DELETE', 'route' => array('comms.destroy', $comm->id))) }}
		   {{ Form::submit('delete', array('class' => 'btn btn-danger')) }}
	{{Form::close}}</td>
	{{ HTML::linkAction("CommsController@show", $i++, array("id"=>$comm->id)) }} - 
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
Route::post('newserv', array('as' => 'newserv',
        'uses' => 'ServicesController@store'
    ));
Route::get('orders/index','ServicesController@getOrder');
Route::get('myadminroom/adminka', 'UsersController@Adminka');
Route::post('my', array('as' => 'my',
        'uses' => 'UsersController@postLogin'
    ));
//Route::group(array('before' => 'auth'), function ()
//{
Route::get('myadminroom/index','OrdersController@getServ');
Route::get('myadminroom/orders','OrdersController@adminOrders');
Route::get('myadminroom/clients','OrdersController@adminClients');
//});
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

/*Route::filter('auth', function()
{
     if (!Auth::check()) return Redirect::to('/');
});*/
/*
Route::get('/create', 'CommsController@create');

Route::post('ask', array('as' => 'ask',
        'uses' => 'CommsController@store'
    ));
Route::post('logg', array('as' => 'logg',
        'uses' => 'CommsController@loginame'
    ));
Route::get('/kas/{id}', 'CommsController@show');
Route::get('{id}', 'CommsController@show');
Route::get('{id}', 'CommsController@destroy');


Route::filter('csrf-ajax', function()
{
    if (Session::token() != Request::header('x-csrf-token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
}); */
/*Route::delete('/destroy', function($id) {
    Comm::find($id)->delete(); 	return Redirect::to('/');
});*/
/*Route::get('/', array(         //тут хз как прописать путь именно к layoutt поэтому через index
    'as' => 'home',
    'uses' => 'IndexController@getIndex'
));

Route::controller('planets', 'PlanetsController');
Route::controller('users', 'UsersController');
Route::controller('password', 'RemindersController');

Route::post('ye', array('as' => 'ye',
        'uses' => 'UsersController@postRegister'
    ));
Route::post('register', array('as' => 'register',
        'uses' => 'UsersController@getRegister'
    ));
Route::get('Registration', 'UsersController@getRegister');
Route::get('Login', 'UsersController@getLogin');
Route::get('Add planet', 'PlanetsController@getAdd');
Route::post('form', array('as' => 'form',
        'uses' => 'PlanetsController@postAdd'
    ));
Route::get('Exit', 'UsersController@getLogout');
Route::get('Views', 'IpsController@store');
*/