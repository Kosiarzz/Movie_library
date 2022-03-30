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
            $table->id();
            $table->string('title');
            $table->string('year');
            $table->string('original_title');
            $table->string('time');
            $table->string('rate');
            $table->string('votes');
            $table->string('description');
            $table->string('img');
            $table->boolean('watched')->default(false);
            $table->timestamps();
            $table->foreignId('genre_id')->unsigned();
            $table->foreignId('country_id')->unsigned();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unsigned();
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
