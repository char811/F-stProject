<?php

class Service extends \Eloquent {

	// Add your validation rules here
  public static $valid = array(
		'shop'=>'required|alpha_num|unique:services',
	);

	// Don't forget to fill this array
	protected $fillable = ['id','shop'];
	
/*	protected $table = 'services';
	
	public static function serv() {

    $mays=Service::All();


	print_r($mays['shop']);
	}
*/
}