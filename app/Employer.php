<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = "employers";
    protected $fillable = [
       'username','password','password2','company_name','company_address','industary_type','business_description',	
       'company_licen',	'company_rl','company_web','con_per_name','con_per_designation',	
       'con_per_email',	'con_per_mobile'
    ];
}

