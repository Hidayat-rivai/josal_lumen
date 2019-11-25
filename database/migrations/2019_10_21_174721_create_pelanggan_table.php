<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->increments('id');
            $table->integer('id_user')->unsigned()->unique();
            $table->string('nama_depan',50);
            $table->string('nama_belakang',50);
            $table->text('alamat');
            $table->string('tempat_lahir',50);
            $table->date('tgl_lahir');
            $table->string('nama_perusahaan',50);
            $table->integer('status')->default(0);
            $table->string('photo_profile');
            $table->string('photo_pks');
            $table->integer('jenis_kelamin')->default(0);
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
        Schema::dropIfExists('pelanggan');
        Schema::enableForeignKeyConstraints();
    }
}
