<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    public static $validation = array(

        'email'     => 'required|email',


        'username'  => 'required|alpha_num|min:6|max:30',
		
		'mobile'  => 'required|min:16|max:18',
		
		'first_name'  => 'alpha_num|max:30',
		
		'last_name'  => 'alpha_num|max:30',


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
 /*   public function sendMail() {
        Mail::send('emails/activ',
            array('username' => $data),
            function ($message) {
                $message->to($this->email)->subject('Спасибо!');
            }
        );
}*/

    public function orders()
    {
        return $this->hasMany('Order', 'costumer');
    }

    public function getcity()
    {
        return $this->HasOne('City', 'city');
    }
}