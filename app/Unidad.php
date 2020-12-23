<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    //
    protected $primaryKey='unidad_id';
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 'estado',
    ];
}
