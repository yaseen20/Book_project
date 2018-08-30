<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Library extends Model
{
    use SoftDeletes;
    protected $table = 'library';
    protected $primarykey = 'id';
    protected $fillable  = ['name','fax','email','phone','lang','image','address'];
    protected $dates = ['created_at','updated_at','deleted_at'];

}
