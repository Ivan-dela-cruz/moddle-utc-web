<?php

namespace App;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Level extends Model
{
    //
    use SoftDeletes;
    protected $table = 'levels';
    protected $fillable = [
        'name',
        'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

    
}

