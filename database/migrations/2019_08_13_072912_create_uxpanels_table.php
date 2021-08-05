<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUxpanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uxpanels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('title');
            $table->integer('container_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('container_id')->references('id')->on('uxcontainers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uxpanels');
    }
}
