<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->nullable();
            $table->string('order_description',1000);
            $table->string('order_status',50);
            $table->string('order_invoice_no',100);
            $table->integer('buyer_id')->unsigned()->nullable();
            $table->timestamp('order_start_at')->nullable();
            $table->timestamp('order_end_at')->nullable();
            $table->timestamps();
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('SET NULL');
        });
        Schema::create('book_order', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('book_id')->unsigned()->index();
          $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
          $table->integer('order_id')->unsigned()->index();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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

      Schema::dropIfExists('book_order');
        Schema::dropIfExists('orders');
    }
}
