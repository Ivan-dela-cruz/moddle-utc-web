<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    protected $fillable = [
        'name_parish', 'canton_id'
    ];

    //relaciones
    public function canton(){
        return $this->belongsTo(Canton::class);
        //una parroquia pertenece a un canton
    }

    public function address(){
        return $this->hasMany(Address::class);
        //una parroquia pertenece a un canton
    }
}
