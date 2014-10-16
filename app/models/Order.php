<?php

class Order extends \Eloquent {

    protected $table = 'orders';

	// Add your validation rules here
    public static $validation = array(
		'service'=>'required|alpha|unique:orders',

        'comment' => 'required',


    );

	// Don't forget to fill this array
	protected $fillable = ['date_start', 'date_end', 'service', 'comment', 'process','costumer'];
	
   /*public function sendMail() {

		Mail::send('emails/adminactiv',
		    array(''=>
    }*/
}