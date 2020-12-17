<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
        'teacher_id',
        'period_level_subject_id'
    ]; 
}
