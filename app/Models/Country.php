<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //Tabla a conectar a este modelo
    protected $table = "countries";
    //La clave primaria de esaa tbla
    protected $primaryKey = "country_id";
    //Omitir campos de auditoria
    public $timestamps = false;
    
    use HasFactory;

    //Relacion entre paises e ididomas
    public function idiomas(){
        //belongsToMany: Parámetros
        //1. El modelo a relacionar
        //2. La tablaa pivote
        //3. Clave foránez del modelo actual (country) en el pivote
        //4. Clave foránea del modelo a relacionar en el pivote
        return $this->belongsToMany(Idioma::class, 'country_languages', 'country_id', 'language_id')->withPivot('official');
    }

    public function region(){
        return $this->belongsTo(Region::Class, 'region_id');
    }
}
