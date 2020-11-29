<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    public $primaryKey='id';
    public $timesstamps = true;
    
    public function tasks(){
        return $this->hasOne('App\Task');
    }
}
