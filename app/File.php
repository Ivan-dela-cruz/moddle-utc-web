<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'files';
    protected $fillable = [
        'name',
        'filename',
        'size_file',
        'url_file'
    ];

    public function fileable(){
        return $this->morphTo();
    }


}
