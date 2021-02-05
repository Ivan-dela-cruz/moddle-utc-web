<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name_province',
    ];

    //relaciones
    public function canton(){
        return $this->hasMany(Canton::class);
        //una parroquia pertenece a un canton
    }
}
