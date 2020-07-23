<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesVehiculosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'clientes_vehiculos';

    /**
     * Run the migrations.
     * @table clientes_vehiculos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('vehiculo_id')->unsigned();

            $table->index(["vehiculo_id"], 'fk_clientes_vehiculos_vehiculos1_idx');


            $table->foreign('vehiculo_id', 'fk_clientes_vehiculos_vehiculos1_idx')
                ->references('id')->on('vehiculos')
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
