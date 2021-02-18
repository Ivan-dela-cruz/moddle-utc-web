<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentTask extends Model
{
    use SoftDeletes;
    protected $table = 'student_tasks';
    protected $fillable = [
        'description', 'course_id', 'student_id', 'task_id','status','note'
    ];
    
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function files(){
        return $this->morphMany(File::class,'fileable');
    }
}
