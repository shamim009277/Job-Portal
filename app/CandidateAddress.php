<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateAddress extends Model
{
    protected $table = "candidate_addresses";
    protected $fillable = [
         'candidate_id','present_address','permanent_address'
    ];
}
