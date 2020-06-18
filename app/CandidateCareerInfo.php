<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateCareerInfo extends Model
{
    protected $table = "candidate_career_infos";
    protected $fillable = [
         'candidate_id','Objective','psalary','exsalary','joblavel','jobnature'
    ];
}

