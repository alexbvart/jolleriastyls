<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Parametro extends Model
{
    protected $table='parametros'; 
    protected $primaryKey='tipo_id';
    public $timestamps=false;
    protected $fillable = [
        'serie', 'numeracion', 
    ];

    public function tipo(){
        return $this->hasOne('App\Tipo', 'tipo_id', 'tipo_id');
    }

    public static function ActualizarNumero($tipo_id, $numeracion){ 
        try{ DB::table('parametros')
            ->where('tipo_id', '=', $tipo_id)
            ->update([ 'numeracion' => $numeracion]); 
            return true; 
        }
        catch(Exception $ex){
             return false;
        }
    }
}
