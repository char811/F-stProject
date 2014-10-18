<?php

class UsersController extends BaseController {

    public function getIndex() {
	    //$re=$this->kuka();
        return View::make('index');
    }




	public function Adminka() {
	             return View::make('myadminroom/adminka');
	}



	public function Recordic() {
	       $rules = Order::$validation;

        $validation = Validator::make(Input::all(), $rules);

        if (!$validation->fails()) {
            return Redirect::to('orders/index')->withErrors($validation)->withInput();
        }

        $order=new Order();
        $order->comment=Input::get('comment');
        $service = Service::find(Input::get('service'));
        $order->service = $service->id;

	    //$user=new User();
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
		//$name=(Input::get('us'));
		//$pas=(Input::get('password'));

        $ab='rt54K7uY783Gj';
        $bc='tik';

       // $user=User::where('admin','=', I);
       // $user = User::firstOrCreate(array('username' => $bc, 'password'=>Hash::make($ab)));
       // $user->save();
   /*     $re=User::first()->admin;
		if(($re['admin'])==0){
        $re->admin=$bc;
        $re->password=$ab;
        }
/*
        if($ab==$pas && $bc==$name) {
          //Log::info("User [{$name['us']}] successfully logged in.");
 		    return Redirect::to('myadminroom/index');
		} else {
		  Log::info("User failed to login or password.");
        }*/
  
        $creds = array(
		    'username'  => Input::get('username'),
            'password' => Input::get('password'),
        ); 
		//var_dump(Auth::validate($creds));var_dump($creds);die();
        if (Auth::attempt($creds, Input::has('remember'))) {
            Log::info("User [{$creds['username']}] successfully logged in.");
 		    return Redirect::to('myadminroom/index');
        } else {
            Log::info("User [{$creds['username']}] failed to login.");
        }


        $alert = "Ты явно не тот за кого себя выдаеш а ну кыш пока не подхватил вирусняка!";

        return Redirect::back()->withAlert($alert);
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }

	
	
	
public function kuka()
	{

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");
$res=Visit::where('date', '>=', '$date')->count();  


if($res==0)
{ $ky=Ip::where('ip_id','>=','0')->delete();
  $wy=Visit::where('visit_id','>=','0')->delete();
  $truk=new Ip;
  $truk->ip_address=$visitor_ip;
  $truk->save();
  $kar=new Visit;
  $kar->date=$date;
  $kar->hosts=1;
  $kar->views=1;
  $kar->save();
   }
else
   { 
    $cur_ip=Ip::where('ip_address', '==', '$visitor_ip');
	$cur_ip=count($cur_ip);
	if($cur_ip>0)
	{  
	$af=Visit::where('date','==','$date')->update(['views'=>'views+1']);
	//$af->save();
	}
	else 
	{    $tr=new Ip;
         $tr->ip_address=$visitor_ip;
         $tr->save();
         $red=new Visit;
         $red->hosts+1;
         $red->views+1;
         $red->save();	
	}
    }
		return;
	}
} 
