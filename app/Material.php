<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // protected $table = 'materials';
    public function materials()
    {
        return $this->hasMany('App\MaterialColor');
    }
}
