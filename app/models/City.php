<?php

class City extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
         'engname' => 'required',
         'rusname' => 'required',
		 'city' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['engname','rusname'];


    public static $mark=[
        'engname.required' => 'Имя на англ обязательно',
        'rusname.required' => 'Имя на рус обязательно',
        'city.required' => 'Менеджер для города обязателен',
    ];

    public function users()
    {
        return $this->belongsTo('User', 'city');
    }
}