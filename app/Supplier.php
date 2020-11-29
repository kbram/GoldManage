<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    public $primaryKey='id';
    public $timesstamps = true;
    
    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }
}
