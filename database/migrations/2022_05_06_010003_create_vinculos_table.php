<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id('nr_contrato');
            $table->unsignedBigInteger('fk_pac_codigo');
            $table->foreign('fk_pac_codigo')->references('pac_codigo')->on('pacientes');
            $table->unsignedBigInteger('fk_plan_codig');
            $table->foreign('fk_plan_codig')->references('plan_codig')->on('planos_saudes');
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
        Schema::dropIfExists('vinculos');
    }
}
