<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_Portal extends Model
{
     protected $table ="oex__portals";
    protected $primarykey="id";
    protected $fillable =['name','email','mobile_no','password','status'];
}
