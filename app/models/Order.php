<?php



class Order extends \Eloquent {

    protected $table = 'orders';

	// Add your validation rules here
    public static $validate = array(
		'service'=>'required|alpha|unique:orders',

        'comment' => 'required',


    );

	// Don't forget to fill this array
	protected $fillable = [ 'created_at', 'service', 'comment', 'process','price','costumer'];
	
   /*public function sendMail() {

		Mail::send('emails/adminactiv',
		    array(''=>
    }*/

    public static $statmessage=array(
        'Новый' =>'Новый',
        'В обработке'=> 'В обработке',
       'Обработан'=> 'Обработан'
    );

    public function getcostumer()
    {
        return $this->belongsTo('User', 'costumer');
    }

    public function getservice()
    {
        return $this->belongsTo('Service', 'service');
    }

}