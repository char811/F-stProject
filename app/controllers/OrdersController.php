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

    public function getServ() {
        return View::make('myadminroom/index');
    }
    public function getService() {
        return View::make('myadminroom/create');
    }

    public function adminOrders() {
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
               return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $ords = $query->paginate(5);
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

        $clients = $query->paginate(5);
            return View::make('myadminroom/clients', compact('clients','term'));

    }


    public function adminRecord(){
        $q=Input::get('email');

        return View::make('myadminroom/adminRecord');
    }

    public function orderChange()
    {
       //$ch=Input::get('order');
     // var_dump($ch);
        //$chan='';
       // if ('POST' == Request::method() && $chan = Request::get('email')){
        return View::make('myadminroom/orderchange');
    }

    public function clientChange()
    {
        $ch=Input::get('client');
        var_dump($ch);
        //$chan='';
        // if ('POST' == Request::method() && $chan = Request::get('email')){
         return View::make('myadminroom/clientchange');
    }

    public function postorderChange(){
        return View::make('myadminroom/orders');
    }

    public function postclientChange(){
        return View::make('myadminroom/clients');
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

        $ords = $query->paginate(5);
        return View::make('myadminroom/orders', compact('ords', 'term'));
	}

    public function clientDestroy($client)
    {
        $kza = Order::where('id','=', $client)->delete();
        $query = Order::OrderBy('created_at',(Input::get('id')=='old')?'asc':'desc');
        $term = '';
        if ('POST' == Request::method() && $term = Request::get('email')){
            $query = $query->whereHas('getcostumer', function($q) use ($term){
                return $q->where('email', 'LIKE', '%' . $term . '%');
            });
        }

        $clients = $query->paginate(5);
        return View::make('myadminroom/clients', compact('clients', 'term'));
    }

}
