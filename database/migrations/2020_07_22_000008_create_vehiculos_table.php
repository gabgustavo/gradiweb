<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'vehiculos';

    /**
     * Run the migrations.
     * @table vehiculos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('placa', 15)->nullable();
            $table->integer('marca_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->string('vehiculoscol', 45)->nullable();

            $table->index(["tipo_id"], 'fk_vehiculos_tipos1_idx');

            $table->index(["marca_id"], 'fk_vehiculos_marcas_idx');
            $table->nullableTimestamps();


            $table->foreign('marca_id', 'fk_vehiculos_marcas_idx')
                ->references('id')->on('marcas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tipo_id', 'fk_vehiculos_tipos1_idx')
                ->references('id')->on('tipos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
