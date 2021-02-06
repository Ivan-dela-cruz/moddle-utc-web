<?php

namespace App;
use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'academic_periods';
    protected $fillable = ['name',
    		'start_date',
            'end_date',
            'status',
            'url_image',
            'color'];
    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

}
