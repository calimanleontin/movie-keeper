<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('year');
            $table->string('rated');
            $table->string('released');
            $table->string('slug');
            $table->string('runtime');
            $table->text('plot');
            $table->string('language');
            $table->string('awards');
            $table->string('imdbPoster');
            $table->string('myPoster');
            $table->string("imdbRating");
            $table->string('imdbVotes');
            $table->string("imdbID");
            $table->string("type");
            $table->bigInteger('views')->default(0);
            $table->timestamps();
        });

        Schema::create('category_movie', function(Blueprint $table){
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
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
