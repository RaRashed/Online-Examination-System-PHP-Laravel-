<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_student extends Model
{
    protected $table ="oex_students";
    protected $primarykey="id";
    protected $fillable =['name','email','mobile_no','dob','exam','password','status'];
}
