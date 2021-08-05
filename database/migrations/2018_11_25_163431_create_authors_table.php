<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_id')->nullable();
            $table->string('author_name',100);
            $table->string('author_image',100)->nullable();
            $table->string('author_country',30);
            $table->string('author_description',1000);
            $table->string('author_email',100);
            $table->string('author_contactno',11);
            $table->string('author_address',500);
            $table->timestamps();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
        Schema::create('author_book', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('author_id')->unsigned()->index();
          $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

          $table->integer('book_id')->unsigned()->index();
          $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
      Schema::dropIfExists('author_book');
      Schema::dropIfExists('authors');

    }
}
