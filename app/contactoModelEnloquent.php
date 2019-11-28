<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactoModelEnloquent extends Model
{
    //Nombre de la tabla que buscara enloquent
    protected $table = "contactos" ;
    protected $fillable = ["nombre", "clave", "comentario", "opinion_del_sitio_web"];
}
