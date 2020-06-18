<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatePreferredArea extends Model
{
    protected $table = "candidate_preferred_areas";
    protected $fillable = [
        'candidate_id','preferred_job_categories','preferred_job_location'
    ];
}
