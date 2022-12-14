<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTipoActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',75)->comment('Nombre de la actividad');
            $table->string('descripcion')->nullable()->comment('Detalles sobre la actividad, es opcional');
            $table->timestamps();
        });
        DB::statement("COMMENT ON TABLE tipo_actividad IS 'Catálogo de estados para las actividades'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_actividad');
    }
}
