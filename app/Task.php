<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    public $primaryKey='id';
    public $timesstamps = true;

    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function account(){
        return $this->hasOne('App\Account');
    }
    public function deliveries(){
        return $this->belongsToMany('App\Delivery');
    }
    
}
