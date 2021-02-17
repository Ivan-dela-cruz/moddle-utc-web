<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodStudent extends Model
{
    protected $table = 'period_students';
    protected $fillable = [
        'student_id',
        'period_id',
        'level_id',
        'subject_id',
        'parallel',
        'status'
    ];

    public function levels(){
        return $this->belongsTo(Level::class,'level_id');
    }

}
