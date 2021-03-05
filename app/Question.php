<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected $table ="questions";
    protected $primarykey="id";
    protected $fillable =['exam_id','question','ans','options','status'];
    
}
