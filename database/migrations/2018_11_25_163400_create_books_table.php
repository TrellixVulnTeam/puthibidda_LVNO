<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
          $table->increments('id');
          $table->string('book_id')->nullable();
          $table->string('book_title',100);
          $table->string('book_cover',100)->nullable();
          $table->string('book_description',1000);
          $table->string('book_stock',10);
          $table->integer('book_price');
          $table->string('book_offer',300);
          $table->integer('book_offer_rate');
          $table->string('book_ranking',10);
          $table->string('book_pages',10);
          $table->timestamp('book_published_date')->nullable();
          $table->string('book_country',20);
          $table->string('book_lang',20);
          $table->timestamps();
          $table->integer('category_id')->unsigned()->nullable();
          $table->integer('publisher_id')->unsigned()->nullable();
          $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('SET NULL');
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
