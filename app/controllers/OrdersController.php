<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::all();

		return View::make('orders.index', compact('orders'));
	}

    public function statistics(){
        $service=Service::all()->count();
        $servs=Service::all();
        $kart=Auth::user()->admin;
        $lll=Auth::user()->username;
        if($kart==$lll) {
        $towns=City::all()->count();
        $counts=User::all();
        $countclients=User::where('mobile','!=','')->count();
        $countmanagers=User::where('mobile','=','')->count();
        $countorders=Order::all()->count();
        return View::make('orders.statistics', compact('towns', 'counts', 'countclients', 'countmanagers', 'countorders', 'servs', 'service'));
        }
        if($kart!=$lll){
            $kkk=Auth::user()->city;
            $towns=City::where('engname','=', $kkk)->count();
            $countclients=User::where('mobile','!=','')
                              ->where('city','=', $kkk)->count();
            $countmanagers=User::where('mobile','=','')
                              ->where('city','=', $kkk)->count();
            $countorders=Order::where('city','=', $kkk)->count();
            return View::make('orders.statistics', compact('towns', 'counts', 'countclients', 'countmanagers', 'countorders', 'servs', 'service'));
        }
    }

    public function myajaxsearch(){
        $term=Request::get('term');

        $users = User::where('email','LIKE', '%' . $term . '%' )->limit(10)->get();
        $response = array();
        foreach ($users as $user) {
            $response[] =  array('label'=> $user->email.'&nbsp -мобила-'.$user->mobile, "value" =>$user->email );
        }
        return Response::json($response);
    }

    public function adminOrders() {
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        $allothers=Order::where('process','=','Новый')
            ->orWhere('process','=','Обработан')
            ->orWhere('process','=','Отклонен')->get();
        $dateoneday=Carbon::now();
        $datesevenday=Carbon::now()->subDays(3);
        $ones=Order::where('process','=','В обработке')
            ->where('created_at', '>=', $datesevenday)
            ->where('created_at', '<=', $dateoneday)->get();
        $dateoneweek=Carbon::now()->subDays(3);
        $datetwoweek=Carbon::now()->subDays(5);
        $oneweeks=Order::where('process','=','В обработке')
            ->where('created_at', '>=', $datetwoweek)
            ->where('created_at', '<=', $dateoneweek)->get();
        $twoweek=Carbon::now()->subDays(5);
        $ninemonth=Carbon::now()->subWeeks(300);
        $twoweeks=Order::where('process','=','В обработке')
            ->where('created_at', '>=', $ninemonth)
            ->where('created_at', '<=', $twoweek)->get();


        $kart=Auth::user()->admin;
        $lll=Auth::user()->username;
        if($kart==$lll) {
            if ($term = Request::get('email')){
                $query = $query->whereHas('getcostumer', function($q) use ($term){
                    return $q->where('email', 'LIKE', '%' . $term . '%');
                });
            }
            $ords = $query->get();
            return View::make('myadminroom/orders', compact('ords', 'term', 'ones', 'oneweeks', 'twoweeks', 'allothers'));
        }

        if($kart!=$lll){
            $ccc=Auth::user()->city;
            $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc')->whereHas('getcostumer', function($k) use ($ccc){
                return $k->where('city','=', $ccc);});
        if ($term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
               return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }
        $ords = $query->get();
        return View::make('myadminroom/orders', compact('ords', 'term', 'ones', 'oneweeks', 'twoweeks', 'allothers'));
        }
    }

    public function adminClients() {

        $term = '';
        $kart=Auth::user()->admin;
        $lll=Auth::user()->username;
        if($kart==$lll) {
            $query = User::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
            if ($term = Request::get('email')){
                $query = $query->where('email', 'LIKE', '%' . $term . '%');
            }
            $clients=$query->get();
            return View::make('myadminroom/clients', compact('clients', 'term'));
        }
        if($kart!=$lll){
        $ccc=Auth::user()->city;
        $query = User::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc')->where('city','=', $ccc);
        if ($term = Request::get('email')){
            $query = $query->where('email', 'LIKE', '%' . $term . '%')
            ->where('city','=', $ccc);
        }

        $clients=$query->get();
            return View::make('myadminroom/clients', compact('clients', 'term'));
        }

    }


    public function adminorderRecord(){
        return View::make('myadminroom/adminorderRecord');
    }

    public function adminRecord(){
        return View::make('myadminroom/adminRecord');
    }

    public function orderChange()
    {
        $modelorder=Order::where('id','=', Input::get('id'))->first();

        return View::make('myadminroom/orderchange', compact('modelorder'));
    }

    public function clientChange()
    {
        $model=User::where('id','=', Input::get('id'))->first();

         return View::make('myadminroom/clientchange',compact('model'));
    }

    public function postorderChange($modelorder){
        $neworder=Order::find($modelorder);
        $orderupdate=Input::all();
        $prov=Order::where('id','=',$modelorder)->first();
        $coco=Input::get('process');

        if(($prov->process)!=$coco){
           $ppp=User::where('id','=',$prov->costumer)->first();
           if($coco == 'В обработке') {
              Mail::send('emails/test', array('data'=>Input::get('price')), function($message)use($ppp){
              $message->to($ppp->email)->subject('Заказ!');
             });
           };
           if($coco =='Отклонен') {
               Mail::send('emails/test', array('data'=>Input::get('id')), function($message)use($ppp){
                   $message->to($ppp->email)->subject('Заказ!');
               });
           }
        }
        if(!$neworder->update($orderupdate)){
        return Redirect::back()->with('message', 'Ошибка сохранения')->withInput();
        }
        $neworder->save();

        return Redirect::to('myadminroom/orders')->with('message', 'Данные успешно изменены');
    }

    public function postclientChange($model){
        $newclient=User::find($model);

        $clientupdate=Input::all();
        if(!$newclient->update($clientupdate)) {
            return Redirect::back()->with('message', 'Ошибка сохранения')->withInput();
        }
        $newclient->save();

        return Redirect::to('myadminroom/clients')->with('message', 'Данные успешно изменены');

    }


    public function create()
	{
		return View::make('orders.create');
	}


	public function store()
	{
		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Order::create($data);

		return Redirect::route('orders.index');
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		return View::make('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);

		return View::make('orders.edit', compact('order'));
	}

	/**
	 * Update the specified order in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$order->update($data);

		return Redirect::route('orders.index');
	}

	/**
	 * Remove the specified order from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function orderDestroy()
	{
        //Order::where('id','=', Input::get('id'))->delete();
        return Redirect::to('myadminroom/orders');
	}

    public function clientDestroy($client)
    {
        $kza = User::where('id','=', $client)->delete();
        return Redirect::back()->with('error',"Клиент удален, как и все его заказы!")->withInput();
    }

}
