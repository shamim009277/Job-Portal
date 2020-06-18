<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = "job_posts";
    protected $fillable = [
          'employers_id','job_title','job_location','email','job_vacancy','job_category','job_description',	
          'job_responsibilities','educational_requirements','employment_status','experience_requirements','additional_requirements',	
          'other_benefits','application_deadline','published_date','salary','logo'
    ];
}

