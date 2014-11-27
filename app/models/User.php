<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {

    public static $validation = array(

        'email'     => 'required|email',

        'username'  => 'required|alpha_num|min:3|max:30',
		
		'mobile'  => 'required|min:16|max:18|mobile_dash',
		
		'first_name'  => 'alpha_num|max:30',
		
		'last_name'  => 'alpha_num|max:30',


    );

    public static $rulesNewManager = array(

        'username'  => 'required|alpha_num|min:3|max:30',

        'password'  => 'required|min:3|alpha_spaces|confirmed',

        'password_confirmation'  => 'required|min:3'

    );

    public static $messages = array(
        'username.required' => 'Имя обязательное поле',
        'password.required' => 'Пароль обязателен',
        'password_confirmation.required' => 'Повтор пароля необходим',
        'username.min' => 'Имя должно содержать хотя бы 3 символа.',
        'alpha_spaces' => 'Пароль введен не верно',
        'confirmed' => 'Пароли должны совпадать',
        'mobile_dash' => 'Мобильный должен содержать только цифры'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
//    protected $username = 'admin';

	protected $table = 'users';

    protected $hidden = array('password');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


    protected $fillable = array('username','first_name','last_nname', 'email', 'mobile', 'admin', 'password', 'created_date');


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function sendMail($user) {
        $nnn=array('email'=>'eugenolshevsky@gmail.com');
        $data=array('detail'=>'Thanks', 'name'=>'my');
        Mail::send('emails/activ',$data,
            function ($message) use ($user, $nnn) {
                $message->to($user->email)->subject('Спасибо!');
                $message->to($nnn->email)->subject('Hi!');
            }
        );
}

    public function orders()
    {
        return $this->hasMany('Order', 'costumer');
    }

    public function cities()
    {
        return $this->hasMany('City', 'city');
    }
    public function sessions()
    {
        return $this->hasMany('Session', 'session');
    }
}