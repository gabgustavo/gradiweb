<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('nombres', 100)->nullable();
          $table->string('email', 80)->nullable();
          $table->string('user', 45)->nullable();
          $table->string('url', 45)->nullable();
          $table->string('password', 80)->nullable();
          $table->string('foto')->nullable();
          $table->string('telefono', 30)->nullable();
          $table->string('token', 250)->nullable();
          $table->string('remember_token')->nullable();
          $table->enum('estado', ['activo', 'inactivo'])->nullable();
          $table->nullableTimestamps();
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
