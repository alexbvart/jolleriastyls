<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Producto extends Model
{
    //
    protected $primaryKey='producto_id';
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 'categoria_id', 'unidad_id', 'precio', 'cantidad', 'estado',
    ];

    public function categoria()
    {
        return $this->hasOne('App\Categoria','categoria_id', 'categoria_id');
    }
    public function unidad()
    {
        return $this->hasOne('App\Unidad','unidad_id', 'unidad_id');
    }
    public function detalleventas(){
        return $this->hasMany('App\DetalleVenta', 'producto_id', 'producto_id');
    }  
    
    public static function ActualizarStock($producto_id,$cantidad){
        return DB::select(DB::raw("UPDATE productos set cantidad = cantidad - '".$cantidad."' where producto_id='".$producto_id."'")
        );
    }
}
