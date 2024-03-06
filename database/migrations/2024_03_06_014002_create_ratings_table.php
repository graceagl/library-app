<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('book_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('rating'); // Rating value (1-5)
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['book_id', 'user_id']); // each user can only rate a book once
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_ratings');
    }
}
?>