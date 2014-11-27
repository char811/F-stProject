<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.11.14
 * Time: 15:39
 */

class Session extends \Eloquent {

    protected $fillable = [ 'id', 'payload', 'last_activity', 'locked'];



    public function user()
    {
        return $this->belongsTo('User', 'session');
    }
}