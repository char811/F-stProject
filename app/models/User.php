<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    public static $validation = array(

        'email'     => 'required|email|unique:users',


        'username'  => 'required|alpha_num',
		
		'mobile'  => 'required|alpha_num|unique:users',
		
		'first_name'  => 'alpha_num',
		
		'last_name'  => 'alpha_num',


    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $hidden = array('password');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


    protected $fillable = array('username','first_name','last_nname', 'email', 'mobile', 'admin', 'password');


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
}