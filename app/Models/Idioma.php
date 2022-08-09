<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    //Tabla a conectar a este modelo
    protected $table = "languages";
    //La clave primaria de esaa tbla
    protected $primaryKey = "language_id";
    //Omitir campos de auditoria
    public $timestamps = false;
    
    use HasFactory;

    //Relacción entre idioma y países 
    public function paises(){
        //belongsToMany: Parámetros
        //1. El modelo a relacionar
        //2. La tablaa pivote
        //3. Clave foránez del modelo actual (country) en el pivote
        //4. Clave foránea del modelo a relacionar en el pivote
        return $this->belongsToMany(Country::class, 'country_languages', 'language_id', 
        'country_id');
    }
}
