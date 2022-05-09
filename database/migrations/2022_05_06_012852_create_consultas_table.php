<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('cons_codigo');
            $table->date('data');
            $table->time('hora');
            $table->boolean('particular');
            $table->unsignedBigInteger('fk_pac_codigo');
            $table->foreign('fk_pac_codigo')->references('pac_codigo')->on('pacientes');
            $table->unsignedBigInteger('fk_med_codigo');
            $table->foreign('fk_med_codigo')->references('med_codigo')->on('medicos');
            $table->unsignedBigInteger('fk_nr_contrato');
            $table->foreign('fk_nr_contrato')->references('nr_contrato')->on('vinculos');
            $table->unsignedBigInteger('fk_proc_codigo');
            $table->foreign('fk_proc_codigo')->references('proc_codigo')->on('procedimentos');
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
        Schema::dropIfExists('consultas');
    }
}
