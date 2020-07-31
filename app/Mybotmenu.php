<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mybotmenu extends Model
{
    //  protected $guarded = array();
    protected $table = 'mybotmenus';
    protected $fillable = ['id','name','price','img',];

}
