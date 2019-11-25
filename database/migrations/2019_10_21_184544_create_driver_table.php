<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->increments('id');
            $table->integer('id_user')->unsigned()->unique();
            $table->integer('kategori')->default(0);
            $table->integer('job')->default(0);
            $table->string('nama_depan',50);
            $table->string('nama_belakang',50);
            $table->string('nomor_ktp',50);
            $table->string('tempat_lahir',50);
            $table->date('tgl_lahir');
            $table->string('photo_profile');
            $table->integer('jenis_kelamin')->default(0);
            $table->string('no_reg');
            $table->string('nama_bank');
            $table->string('rekening_bank');
            $table->string('atas_nama');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')->on('users')
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
        Schema::dropIfExists('driver');
        Schema::enableForeignKeyConstraints();
    }
}
