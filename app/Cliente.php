<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes'; 
    protected $primaryKey='cliente_id';
    public $timestamps=false;
    protected $fillable = [
        'ruc_dni', 'nombres', 'email', 'direccion', 'estado',
    ];

    public function tipo(){
        return $this->hasOne('App\Tipo', 'tipo_id', 'tipo_id');
    }
}
