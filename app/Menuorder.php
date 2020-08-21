<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuorder extends Model
{
    protected $table = 'menuorders';
    protected $guarded = array();
    // protected $guarded = [];
    protected $Menuorder = [
        'order' => 'array'
    ];

}
