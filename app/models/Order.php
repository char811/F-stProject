<?php


/**
 * Class Order
 */
class Order extends \Eloquent {

    const STATUS_NEW = 'Новый';
    const STATUS_IN_PROCESS = 'В обработке';
    const STATUS_PROCESSED = 'Обработан';
    const STATUS_REJECTED = 'Отклонен';

    protected $table = 'orders';

	// Add your validation rules here
    public static $validate = array(
		'service'=>'required|alpha|unique:orders',

        'comment' => 'required',


    );

	// Don't forget to fill this array
	protected $fillable = [ 'created_at', 'service', 'comment', 'process','price','costumer'];

    /**
     *
     * Функция возвращает Email пользователя
     *
     * @return mixed
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getcostumer()
    {
        return $this->belongsTo('User', 'costumer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getservice()
    {
        return $this->belongsTo('Service', 'service');
    }

}