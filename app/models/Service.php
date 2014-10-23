<?php

class Service extends \Eloquent {

	// Add your validation rules here
  public static $valid = array(
		'name'=>'alpha_num|unique:services',
	);

	// Don't forget to fill this array
	protected $fillable = ['name'];

	protected $table = 'services';


}