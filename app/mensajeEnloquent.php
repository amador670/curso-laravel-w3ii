<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensajeEnloquent extends Model
{
    //Nombre de la tabla que buscara enloquent
    protected $table = "mensajes";

    //Nombre de las propiedades de la base de datos donde se permitiran creaciones de datos masivos
    protected $fillable = ["name", "email", "comment", "valoration_for_website", "id_user_message", "avatar"];
}
