<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table='detalleventas'; 
    public $timestamps=false;
    protected $fillable = [
        'venta_id', 'producto_id', 'precio', 'cantidad', 
    ];

    public function producto(){
        return $this->hasOne('App\Producto', 'producto_id', 'producto_id');
    }

    public function ventas(){
        return $this->hasOne('App\CabeceraVenta', 'venta_id', 'venta_id');
    }
}
