<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id')->nullable();
            $table->string('category_title',10);
            $table->string('category_class',10)->nullable();
            $table->string('category_year',10)->nullable();
            $table->string('category_semester',10)->nullable();
            $table->string('category_part',10)->nullable();
            $table->string('category_session',10)->nullable();
            $table->string('category_favorite',10)->nullable();
            $table->string('category_relation',10)->nullable();
            $table->timestamps();
        });

        /*Schema::create('category_library', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('category_id')->unsigned()->index();
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

          $table->integer('library_id')->unsigned()->index();
          $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
          $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     /*   Schema::dropIfExists('category_library');*/
        Schema::dropIfExists('categories');
    }
}