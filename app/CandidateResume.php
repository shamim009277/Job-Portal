<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateResume extends Model
{
    protected $table = "candidate_resume";
    protected $fillable = [
                'resume','candidate_id'
    ];
}
