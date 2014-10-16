<?php

class Order extends \Eloquent {

    protected $table = 'orders';

	// Add your validation rules here
	public static $rules = [
		'service'=>'required|alpha|unique:orders',
	];

	// Don't forget to fill this array
	protected $fillable = ['date', 'service', 'comment'];
	
   /*public function sendMail() {

		Mail::send('emails/adminactiv',
		    array(''=>
    }*/
}