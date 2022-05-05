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
            $table->string('year')->nullable();
            $table->string('original_title')->nullable();
            $table->string('time')->nullable();
            $table->string('rate')->nullable();
            $table->string('votes')->nullable();
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->boolean('watched')->default(false);
            $table->timestamps();
            $table->foreignId('genre_id')->unsigned()->nullable();
            $table->foreignId('country_id')->unsigned()->nullable();
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
