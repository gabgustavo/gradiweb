<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'clientes';

    /**
     * Run the migrations.
     * @table clientes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombres', 100)->nullable();
            $table->integer('tipo_documento_id')->unsigned();
            $table->integer('documento')->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('email', 80)->nullable();

            $table->index(["tipo_documento_id"], 'fk_clientes_tipos_documentos1_idx');
            $table->nullableTimestamps();


            $table->foreign('tipo_documento_id', 'fk_clientes_tipos_documentos1_idx')
                ->references('id')->on('tipos_documentos')
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
