<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUxhandlersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('uxhandlers', function (Blueprint $table) {
      $table->increments('id');
      $table->string('psucode');
      $table->string('title');
      $table->timestamps();
    });

    Schema::create('uxcard_uxhandler', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('uxcard_id')->unsigned()->index();
      $table->foreign('uxcard_id')->references('id')->on('uxcards');
      $table->integer('uxhandler_id')->unsigned()->index();
      $table->foreign('uxhandler_id')->references('id')->on('uxhandlers');
      $table->boolean('active');
      $table->timestamps();
    });
    Schema::create('uxhandler_uxpanel', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('uxpanel_id')->unsigned()->index();
      $table->foreign('uxpanel_id')->references('id')->on('uxpanels');
      $table->integer('uxhandler_id')->unsigned()->index();
      $table->foreign('uxhandler_id')->references('id')->on('uxhandlers');
      $table->boolean('active');
      $table->timestamps();
    });
    Schema::create('uxcontainer_uxhandler', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('uxcontainer_id')->unsigned()->index();
      $table->foreign('uxcontainer_id')->references('id')->on('uxcontainers');
      $table->integer('uxhandler_id')->unsigned()->index();
      $table->foreign('uxhandler_id')->references('id')->on('uxhandlers');
      $table->boolean('active');
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
    Schema::dropIfExists('uxcontainer_uxhandler');
    Schema::dropIfExists('uxpanel_uxhandler');
    Schema::dropIfExists('uxcard_uxhandler');
    Schema::dropIfExists('uxhandlers');
  }
}
