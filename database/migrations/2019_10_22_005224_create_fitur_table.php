<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitur', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('level');
            $table->string('nama_fitur',50);
            $table->string('icon',50);
            $table->string('image');
            $table->integer('status');
            $table->timestamps();
            
            $table->foreign('parent_id')
                ->references('id')->on('fitur')
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
        Schema::dropIfExists('fitur');
        Schema::enableForeignKeyConstraints();
    }
}
