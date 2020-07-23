<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSettingsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'email_settings';

    /**
     * Run the migrations.
     * @table email_settings
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('active')->nullable()->default('0');
            $table->boolean('authenticate')->nullable();
            $table->string('smtp_secure')->nullable();
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('password', 150)->nullable();
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
