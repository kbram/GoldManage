<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    public $primaryKey='id';
    public $timesstamps = true;
    
    public function tasks(){
        return $this->belongsToMany('App\Task');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}
