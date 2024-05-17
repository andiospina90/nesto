<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_empresa');
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_proyecto');
            $table->unsignedBigInteger('id_usuario');
            $table->boolean('estado')->default(1)->comment('0: Inactiva, 1: Activa, 2: Terminada');
            $table->string('nombre', 255);
            $table->string('descripcion',1000)->nullable();
            $table->integer('prioridad')->default('2')->comment('1: Baja, 2: Media, 3: Alta');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('id_empresa');
        });

        Schema::dropIfExists('tareas');
    }
}
