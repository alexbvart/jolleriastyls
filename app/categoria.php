<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    //
    protected $primaryKey='categoria_id';
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 'estado',
    ];
}
