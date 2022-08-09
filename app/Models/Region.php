<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //Tabla a conectar a este modelo
    protected $table = "regions";
    //La clave primaria de esaa tbla
    protected $primaryKey = "region_id";
    //Omitir campos de auditoria
    public $timestamps = false;
    
    use HasFactory;

    //Relacion entre regiones y continentes
    public function continente(){
        //belongsTo: Parámetros
        //1. El modelo a relacionar
        //2. La clave foránea del modelo relacionar en elmodelo actual
        return $this->belongsTo(Continent::class, 'continent_id');
    }

     //Relacción entre región y países
     public function paises(){
        //hasMany Parametros:
        //1. El modelo a relacionar
        //2. La clave foránea del modelo actual en el modelo relacionar 
        return $this->hasMany(Country::class, 'region_id');
    }
}
