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

Route::filter('men', function()
{
    if (!Auth::check()) return Redirect::to('/');
    else {
    $kart=Auth::user()->admin;
    $lll=Auth::user()->username;
    if ($kart!=$lll) return Redirect::to('admin');
    }
});
Route::group(array('before' => 'men'), function ()
{
Route::get('newmanager', 'UsersController@newManager');
Route::post('manager', array('as'=>'manager',
    'uses' => 'UsersController@managerRecord'
));

});
Route::filter('ka', function()
{
   // if (Auth::guest()) return Redirect::guest('orders/index');
     if (!Auth::check()) return Redirect::to('/');
});

Route::group(array('before' => 'ka'), function ()
{


Route::post('services/index', array('as' => 'services/index',
        'uses' => 'ServicesController@store'
));

Route::get('services/index','ServicesController@create');

Route::post('cities/index', array('as' => 'cities/index',
        'uses' => 'CitiesController@store'
));

Route::get('cities/index','CitiesController@create');

Route::post('exit', array('as'=>'exit', 'uses' => 'UsersController@getLogout'));

Route::get('myadminroom/adminRecord', 'OrdersController@adminRecord');
Route::get('myadminroom/adminorderRecord', 'OrdersController@adminorderRecord');

Route::post('record', array('as' => 'record',
        'uses' => 'UsersController@myRecord'
));
Route::post('recorder', array('as' => 'recorder',
        'uses' => 'UsersController@myorderRecord'
));

/*Route::post('myadminroom/clients',array('as' => 'myadminroom/clients',
            'uses' => 'UsersController@adminClients')
);*/

Route::get('myadminroom/orders',array('as'=>'myadminroom/orders', 'uses'=> 'OrdersController@adminOrders'));
Route::get('myadminroom/clients',array('as'=>'clients', 'uses'=>'OrdersController@adminClients'));

Route::get('myadminroom/orders/delete', array('as'=>'orderdelete', 'uses'=> 'OrdersController@orderDestroy'));
Route::get('myadminroom/clients{client}', array('as'=>'clientdelete', function($client){
   // $kza = User::where('id','=', $client)->delete();
    return Redirect::back()->with('clidel',"Клиент удален, как и все его заказы!")->withInput();
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


Route::any('mysearch', array('uses'=>'OrdersController@myajaxsearch'));


    Route::group(['as' => 'su', 'domain' => '{city}.lara/public'], function () {
        Route::get('admin', 'UsersController@Adminka');
    });

Route::get('orders/statistics',array('as'=>'orders/statistics', 'uses'=> 'OrdersController@statistics'));

Route::any('orders/chart', array('as'=>'chart', function(){
    //$marketing=array();
    /*$marketing['Новые']=Order::where('service','=','Marketing')
        ->where('process','=', 'Новый')->count();
    $marketing['В обработке']=Order::where('service','=','Marketing')
        ->where('process','=', 'В обработке')->count();
    $marketing['Обработано']=Order::where('service','=','Marketing')
        ->where('process','=', 'Обработан')->count();
    $marketing['Отклонено']=Order::where('service','=','Marketing')
        ->where('process','=', 'Отклонен')->count();
    $mark=Order::where('service','=','Marketing')->count();
    $char=$marketing['Новые'];
    $kit=floor(($char/$mark)*100);
    $marketing['Новые']=$kit;*/
   /* $mar=Order::where('service','=','Marketing')
        ->where('process','=', 'Новый')->count();
    $marke['В обработке']=Order::where('service','=','Marketing')
        ->where('process','=', 'В обработке')->count();
    $mat['Обработано']=Order::where('service','=','Marketing')
        ->where('process','=', 'Обработан')->count();
    $marketi['Отклонено']=Order::where('service','=','Marketing')
        ->where('process','=', 'Отклонен')->count();
    $mark=Order::where('service','=','Marketing')->count();
    $char=$mark;
   // $kit=floor(($char/$mark)*100);
    $manka=array();
    //$manka['success']=array('name'=>'old', 'data'=>351);
    $manka['data']=[['name'=>'new', 'data'=>100], ['name'=>'old', 'data'=>351]];
//$manka['data']=351;
    return Response::json($manka);
   */

    //$mar=Order::where('service','=','Marketing')->get();
   /* $serv= Service::all();
    $ser= Service::all();
    $services=Service::all()->count();
    $servicefirst=$serv->first()->id;
    for($serv->first()->name=$servicefirst;   $serv->first()->name<=$services;   $serv->first()->name++)  {
        $ser= Service::where('id','=', $serv->first()->name);
        $m=$ser->first()->name;
        $mar=Order::where('service','=', $serv->first()->name)
            ->where('process','=', 'Новый')->count();
        $marke=Order::where('service','=', $serv->first()->name)
            ->where('process','=', 'В обработке')->count();
        $mat=Order::where('service','=', $serv->first()->name)
            ->where('process','=', 'Обработан')->count();
        $marketi=Order::where('service','=', $serv->first()->name)
            ->where('process','=', 'Отклонен')->count();
        $mark=Order::where('service','=', $serv->first()->name)->count();
        $manka[$m]=[['name'=>'new', 'data'=>$mar], ['name'=>'obrabotke', 'data'=>$marke] , ['name'=>'obrabotan', 'data'=>$mat], ['name'=>'otklonen', 'data'=>$marketi]];
    }*/

    $serv=Input::get('name');
    //echo $serv;
    //var_dump($serv);
    $mar=Order::where('service','=', $serv)
        ->where('process','=', 'Новый')->count();
    $marke=Order::where('service','=', $serv)
        ->where('process','=', 'В обработке')->count();
    $mat=Order::where('service','=', $serv)
        ->where('process','=', 'Обработан')->count();
    $marketi=Order::where('service','=', $serv)
        ->where('process','=', 'Отклонен')->count();
    $mark=Order::where('service','=',$serv)->count();
    $char=$mar;
    if($char!=0) $k=floor(($char/$mark)*100); else $k=0;
    $char=$marke;
    if($char!=0) $ki=floor(($char/$mark)*100); else $ki=0;
    $char=$mat;
    if($char!=0) $kit=floor(($char/$mark)*100); else $kit=0;
    $char=$marketi;
    if($char!=0) $kits=floor(($char/$mark)*100); else $kits=0;
    $manka=[['name'=>'new', 'data'=>$mar, 'pro'=>$k, 'my'=>$serv], ['name'=>'v obrabotke', 'data'=>$marke, 'pro'=>$ki] , ['name'=>'obrabotan', 'data'=>$mat, 'pro'=>$kit], ['name'=>'otklonen', 'data'=>$marketi, 'pro'=>$kits]];
    return Response::json($manka);

}));

});

