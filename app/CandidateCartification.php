<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateCartification extends Model
{
    protected $table = "candidate_cartifications";
    protected $fillable = [
          'certification','location','institute','duration'
    ];
}
