<?php

class Service extends \Eloquent {

	// Add your validation rules here
  public static $valid = array(
		'name'=>'alpha_num|unique:services',
	);

	// Don't forget to fill this array
	protected $fillable = ['id','name'];

	protected $table = 'services';
	
	public static function serv() {

    $mays=Service::All();



	return $mays;
	}

}