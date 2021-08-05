<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewers', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('reviewer_id')->nullable();
            $table->string('reviewer_name',100);
            $table->string('reviewer_description',1000);
            $table->string('reviewer_email',100);
            $table->timestamps();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
        Schema::create('book_reviewer', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('book_id')->unsigned()->index();
          $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
          $table->integer('reviewer_id')->unsigned()->index();
          $table->foreign('reviewer_id')->references('id')->on('reviewers')->onDelete('cascade');
          $table->string('reviewer_comments',1000);
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
        Schema::dropIfExists('book_reviewer');
        Schema::dropIfExists('reviewers');
    }
}
