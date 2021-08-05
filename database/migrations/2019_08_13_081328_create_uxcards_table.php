<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUxcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uxcards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('title');
            $table->integer('panel_id')->unsigned()->nullable();
            $table->foreign('panel_id')->references('id')->on('uxpanels');
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
        Schema::dropIfExists('uxcards');
    }
}
