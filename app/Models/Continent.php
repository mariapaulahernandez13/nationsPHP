<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //Tabla a conectar a este modelo
    protected $table = "continents";
    //La clave primaria de esaa tbla
    protected $primaryKey = "continent_id";
    //Omitir campos de auditoria
    public $timestamps = false;
    
    use HasFactory;

    //Relacción entre continente y región 
    public function regiones(){
        //hasMany Parametros:
        //1. El modelo a relacionar
        //2. La clave foránea del modelo actual en el modelo relacionar 
        return $this->hasMany(Region::class, 'continent_id');
    }

    //Relacción entre continente y suss países
    //Abuelo: Continente
    //papá: Región
    //Nieto: Country
    public function paises(){
        //hasMany Parametros:
        //1. Modelo nieto
        //2. Modelo papá 
        //3. Clave foránea del abuelo en el papá
        //4. Clave foránea del papá en el nieto
        return $this->hasManyThrough(Country::class, Region::class, 'continent_id', 'region_id');
    }
}
