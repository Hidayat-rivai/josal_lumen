<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_kendaraan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->increments('id');
            $table->integer('merek')->unsigned()->unique();
            $table->integer('id_jenis');
            $table->string('nomor_plat');
            $table->string('warna_kendaraan')->nullable();
            $table->timestamps();
            $table->integer('id_type')->unsigned();
            $table->integer('id_driver')->unsigned();
            
            $table->foreign('id_driver')
                ->references('id')->on('driver')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_type')
                ->references('id')->on('type_kendaraan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('driver_kendaraan');
        Schema::enableForeignKeyConstraints();
    }
}
