<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
Date::setLocale('es');
class Task extends Model
{
    //
    use SoftDeletes;
    protected $start_date = [
        'start_date'
    ];
    protected $end_date = [
        'end_date'
    ];
    protected $end_time =[
        'end_time'
    ];

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

    public function getStartDateAttribute($start_date)
    {
        return new Date($start_date);
    }

    public function getEndDateAttribute($end_date)
    {
        return new Date($end_date);
    }
    public function getEndTimeAttribute($end_time)
    {
        return new Date($end_time);
    }

    public function taskdeliveries()
    {
        return $this->hasMany(StudentTask::class, 'task_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function files(){
        return $this->morphMany(File::class,'fileable');
    }

}
