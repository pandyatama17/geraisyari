<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialColor extends Model
{
    // protected $table = 'material_colors';
    public function material_colors()
    {
        return $this->belongsTo('App\Material');
    }
}
