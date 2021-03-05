<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
     protected $table ="results";
    protected $primarykey="id";
    protected $fillable =['exam_id','user_id','yes_ans','no_ans','result_json'];
}
