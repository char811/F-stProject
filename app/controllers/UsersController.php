<?php

class UsersController extends BaseController {

    public function getIndex() {
	    //$re=$this->kuka();
        return View::make('index');
    }




    public function order() {
        return $this->hasMany('Order', 'costumer');
    }


	public function Adminka() {
	             return View::make('myadminroom/adminka');
	}
	
	public function Record() {
	       $rules = User::$validation;

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::to('orders/index')->withErrors($validation)->withInput();
        }

	$priem=new User;
        $priem->fill(Input::all());
        $priem->save();
//	$rt=$priem->sendMail();
        $date=date(Y,m,d);
    $ka=new Order;
        $ka->fill(Input::all());
        $ka->date_start=$date;
        $ka->save();
//	$mm=$ka->sendMail();
    return Redirect::to('/');
    }


    public function getLogin() {
        return View::make('users/login');
    }

    public function postLogin() {
		
		
		$name=(Input::get('us'));
		$pas=(Input::get('password'));
		$ab='rt54K7uY783Gj';
		$bc='tik';
        if($ab==$pas && $bc==$name) {
          //Log::info("User [{$name['us']}] successfully logged in.");
 		    return Redirect::to('myadminroom/index');
		} else {
		  Log::info("User failed to login or password.");
        }
  
          $creds = array(
		    'username'  => Input::get('username'),
            'password' => Input::get('password'),
        ); 
		
        if (Auth::attempt($creds, Input::has('remember'))) {
            Log::info("User [{$creds['username']}] successfully logged in.");
 		    return Redirect::to('/');
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
