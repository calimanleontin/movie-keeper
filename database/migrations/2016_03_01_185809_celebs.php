<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Celebs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebs', function(Blueprint $table){
            $table->increments('id');
            $table->bigInteger('views')->default(0);
            $table->string('name');
            $table->integer('role_id')->unsigned()->default(0);
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('movie_celeb', function(Blueprint $table){
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');

            $table->integer('celeb_id')->unsigned()->index();
            $table->foreign('celeb_id')
                ->references('id')
                ->on('celebs')
                ->onDelete('cascade');

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
        //
    }
}
