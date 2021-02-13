<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = [
        'name',
        'description',
        'career',
        'url_image',
        'content',
        'status',
        'user_id',
        'academic_period_id',
        'level_id',
        'subject_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function academic_period()
    {
        return $this->belongsTo(Period::class, 'academic_period_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class,'course_id');
    }
}
