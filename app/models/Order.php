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

    public function getReminderEmail()
    {
        return $this->email;
    }

    public static $statmessage=array(
        'Новый' =>'Новый',
        'В обработке'=> 'В обработке',
        'Обработан'=> 'Обработан',
        'Отклонен'=>'Отклонен',
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