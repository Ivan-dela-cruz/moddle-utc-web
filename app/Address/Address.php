<?php

namespace App\Address;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address', 'parish_id', 'user_id'
    ];

    //relaciones
    public function parish(){
        return $this->belongsTo(Parish::class);
        //una direccion pertenece a una parroquia
    }

    public function user(){
        return $this->belongsTo(User::class);
        //una direccion pertenece a una parroquia
    }
}
