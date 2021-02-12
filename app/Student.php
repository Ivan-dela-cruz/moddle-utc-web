<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use SoftDeletes;
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'url_image',
        'email',
        'dni',
        'status',
        'passport',
        'instruction',
        'marital_status',
        'birth_date',
        'phone'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function files(){
        return $this->morphMany(File::class,'fileable');
    }


}
