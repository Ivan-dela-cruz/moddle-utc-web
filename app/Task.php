<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tasks';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'url_file',
        'end_time',
        'status',
        'course_id'
    ];

    
}
