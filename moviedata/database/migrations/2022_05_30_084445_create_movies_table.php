<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('Title');
            $table->string('Year');
            $table->string('Rated');
            $table->string('Released');
            $table->string('Runtime');
            $table->string('Genre');
            $table->string('Director');
            $table->string('Writer');
            $table->string('Actors');
            $table->string('Plot');
            $table->string('Language');
            $table->string('Country');
            $table->string('Awards');
            $table->string('Poster');
            $table->integer('Ratings_id');
            $table->string('Metascore');
            $table->string('imdbRating');
            $table->string('imdbVotes');
            $table->string('imdbID');
            $table->string('Type');
            $table->string('DVD');
            $table->string('BoxOffice');
            $table->string('Production');
            $table->string('Website');
            $table->string('Response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
