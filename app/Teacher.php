<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teacher extends Model
{
    //
    use SoftDeletes;
    protected $table = 'teachers';
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'url_image',
        'email',
        'profession',
        'dni',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}