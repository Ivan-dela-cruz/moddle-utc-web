<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'academic_periods';
    protected $fillable = ['name',
    		'start_date',
            'end_date',
            'status']; 
        
}
