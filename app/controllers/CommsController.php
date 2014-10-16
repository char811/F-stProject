<?php

class CommsController extends \BaseController {

	/**
	 * Display a listing of comms
	 *
	 * @return Response
	 */
	public function index()
	{
		$comms = Comm::all();

		return View::make('comms.index', compact('comms'));
	}

	/**
	 * Show the form for creating a new comm
	 *
	 * @return Response
	 */
	public function create()
	{
		$comms = Comm::all();

		return View::make('comms.create', compact('comms'));
	}

	/**
	 * Store a newly created comm in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*$author = new Comm;
        $author->username = Input::get('username');
        $author->email= Input::get('email');
        $author->save();*/
		$validator = Validator::make($data = Input::all(), Comm::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$author = new Comm;
        $author->fill($data);
		$author->password= Hash::make($author->password);
        $author->save();

		return Redirect::to('/');
	}

	
	public function loginame() {
        // Формируем базовый набор данных для авторизации
        // (isActive => 1 нужно для того, чтобы аторизоваться могли только
        // активированные пользователи)
        $creds = array(
		    'username'  => Input::get('username'),
            'password' => Input::get('password'),
        );

        $remember=Input::has('remember');
        // Пытаемся авторизовать пользователя
        if (Auth::attempt($creds, Input::has('remember'))) {
            Log::info("User [{$username}] successfully logged in.");
            return Redirect::to('/');
        } else {
            Log::info("User [{$username}] failed to login.");
        }

        $alert = "Неверная комбинация имени (email) и пароля, либо учетная запись еще не активирована.";

        // Возвращаем пользователя назад на форму входа с временной сессионной
        // переменной alert (withAlert)
        return Redirect::back()->withAlert($alert);
    }

	/**
	 * Display the specified comm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$comm = Comm::find($id);
		return Redirect::to('/')->with(print_r('Welcome to the site</br>'.$comm->username. '!') );
	}

	/**
	 * Show the form for editing the specified comm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comm = Comm::find($id);

		return View::make('comms.edit', compact('comm'));
	}

	/**
	 * Update the specified comm in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$comm = Comm::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Comm::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$comm->update($data);

		return Redirect::route('comms.index');
	}

	/**
	 * Remove the specified comm from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$kza = Comm::find($id)->delete();
		return Redirect::to('/');
	}

}
