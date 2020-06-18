<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidates";
    protected $fillable = [
       'fullname','email','password','password2','mobile','gender'
    ];
}
