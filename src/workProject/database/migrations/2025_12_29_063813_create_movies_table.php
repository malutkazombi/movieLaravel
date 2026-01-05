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
            $table->increments('id');
            $table->string('title', 100);
            $table->enum('genre', ['action', 'comedy', 'drama', 'horror', 'sci-fi', 'thriller', 'romance', 'animation']);
            $table->year('release_year');
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('rating')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
//delete if user deleted
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
