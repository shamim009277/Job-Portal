<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatePersonalInfo extends Model
{
    protected $table = "candidate_personal_infos";
    protected $fillable = [
       'candidate_id','fname','lname','father_name','mother_name','nid','pass_num',	
       'birth_date','nissue_date','gender','mobile_number','religion','marital_status',	
       'email','nationality'
    ];
}
