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
        $ords=Order::paginate(20);
        return View::make('myadminroom/orders', compact('ords'));
    }

    public function adminClients() {
        $clients=User::all();
        $q=Input::get('username');
        $cr=array();
        if (strpos($q, '@')) {
            $cr['email'] = $q;
            $cofs=array();
            $cofs=User::where('email','=', $cr)->first();
            //print_r($cofs['mobile']);
            return View::make('myadminroom/clients', compact('clients','cofs'));
        } else {
            $cr['username'] = $q;
            $cofs=array();
            $cofs=User::where('username','=', $cr)->first();
            return View::make('myadminroom/clients', compact('clients','cofs'));

        }


        //return View::make('myadminroom/clients', compact('clients'));
    }

    public function postSearch(){
        $key=Input::get('email');
        echo ($key);
   //     $poisk=User::where('email','=',Input::get('key'))->first();
     //   print_r($poisk['email']);
    }

    /**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
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
	public function destroy($ord)
	{
        $kza = Order::where('id','=', $ord)->delete();
        $ords=Order::paginate(20);
        return View::make('myadminroom/orders', compact('ords'));
	}

}
