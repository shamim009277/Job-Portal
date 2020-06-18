<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateEmploymentHistory extends Model
{
    protected $table="candidate_employment_histories";
    protected $fillable=[
         'candidate_id','company_name','company_business','designation','responsibilities','department','company_location','join_time','resign_time'	

    ];
}
