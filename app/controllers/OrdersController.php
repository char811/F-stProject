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

    public function user() {
        return $this->belongsTo('User', 'username');
    }


    public function getProcess() {

    }


    public function adminOrders() {
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
               return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $ords = $query->paginate(13);
        return View::make('myadminroom/orders', compact('ords', 'term'));
    }

    public function adminClients() {
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';

        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
                return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $clients = $query->paginate(13);
            return View::make('myadminroom/clients', compact('clients','term'));

    }


    public function adminRecord(){
        $q=Input::get('email');

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
        if(!$neworder->update($orderupdate)){
        return Redirect::back()->with('message', 'Ошибка сохранения')->withInput();
        }
        $neworder->save();
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term='';
        $ords = $query->paginate(13);
        return View::make('myadminroom/orders', compact('ords','term'))->with('message', 'Данные успешно изменены');
    }

    public function postclientChange($model){
        $newclient=User::find($model);
        $clientupdate=Input::all();
        if(!$newclient->update($clientupdate)) {
            return Redirect::back()->with('message', 'Ошибка сохранения')->withInput();
        }
        $newclient->save();
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term='';
        $clients = $query->paginate(13);
        return View::make('myadminroom/clients', compact('clients','term'))->with('message', 'Данные успешно изменены');

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
	public function orderDestroy($ord)
	{
        $kza = Order::where('id','=', $ord)->delete();
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
                return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $ords = $query->paginate(13);
        return View::make('myadminroom/orders', compact('ords', 'term'));
	}

    public function clientDestroy($client)
    {
        $kza = User::where('id','=', $client)->delete();
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
                return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $clients = $query->paginate(13);
        return View::make('myadminroom/clients', compact('clients', 'term'));
    }

}
