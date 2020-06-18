<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateTraining extends Model
{
    protected $table = "candidate_traings";
    protected $fillable = [

          'training_title','country','topic','year','institute','duration','location','start_time','end_time'
    ];
}
