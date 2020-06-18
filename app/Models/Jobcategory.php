<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobcategory extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'category_name','status'
    ];
}
