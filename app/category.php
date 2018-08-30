<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 

class category extends Model
{

    use SoftDeletes;
    public $table='catagory';
    public $primaryKey = 'id';
    public $fillable = ['name','timeStamp','image','lang'];
    protected $dates = ['created_at', 'updated_at','deleted_at'];

}