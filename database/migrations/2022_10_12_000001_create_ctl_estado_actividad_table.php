<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCtlEstadoActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctl_estado_actividad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',25)->comment('Estado de la actividad, desde borrador hasta aprobada');
            $table->timestamps();
        });
        DB::statement("COMMENT ON TABLE ctl_estado_actividad IS 'Catálogo de estados para las actividades'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctl_estado_actividad');
    }
}
