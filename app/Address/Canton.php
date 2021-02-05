<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $fillable = [
        'name_canton', 'province_id'
    ];

    //relaciones
    public function province(){
        return $this->belongsTo(Province::class);
        //un canton pertenece a una provincia
    }
    public function parish(){
        return $this->hasMany(Parish::class);
        //una parroquia pertenece a un canton
    }
}
