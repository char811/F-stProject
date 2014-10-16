<?php

class Comm extends Eloquent {
	// Add your validation rules here
	public static $rules = [

        'email'     => 'required|email|unique:comms',

        // Поле username является обязательным, содержать только латинские символы и цифры, и
        // также быть уникальным в таблице comms
        'username'  => 'required|alpha_num|unique:comms',

        // Поле password является обязательным, должно быть длиной не меньше 6 символов, а
        // также должно быть повторено (подтверждено) в поле password_confirmation
        'password'  => 'required|confirmed|min:6',

	];
	// Don't forget to fill this array
	protected $fillable = ['id','username', 'email','comment', 'password'];

	protected $table = 'comms';
	
	
	
	
	
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

}