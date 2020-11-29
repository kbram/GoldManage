<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    public $primaryKey='id';
    public $timesstamps = true;
    
    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
