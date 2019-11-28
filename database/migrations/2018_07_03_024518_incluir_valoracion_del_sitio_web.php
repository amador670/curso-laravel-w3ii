<?php

/******
    Este migracion añade la valoracion del sitio web (Campo select Option de HTML) a nuestra migracion "mensaje_usuario" que es la encargada de recibir los datos enviados por el usuario a nuestro sitio web
 ******/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncluirValoracionDelSitioWeb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensajes', function (Blueprint $table) {
            $table->string("opinion_del_sitio_web")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensajes', function (Blueprint $table) {
            $table->dropColumn("opinion_del_sitio_web");
        });
    }
}
