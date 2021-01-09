<?php

namespace App;
use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table='subjects';
    protected $fillable = ['name', 'description', 'slug','status','level_id'];
    
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

}
