<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('library_id')->nullable();
            $table->string('library_title',100);
            $table->string('library_password',256);
            $table->string('library_description',500)->nullable();
            $table->string('library_address',200);
            $table->string('library_district',100);
            $table->string('library_state',100);
            $table->string('library_preferences',100)->nullable();
            $table->string('library_payment_type',100);
            $table->string('library_owner',100);
            $table->string('library_contactno',11)->unique();
            $table->string('library_email',100)->unique();
            $table->string('library_telephone',50)->nullable();
            $table->string('library_cover',100)->default('noimage.jpg');
            $table->date('library_est_date');
            $table->date('library_end_date')->nullable();
            $table->string('library_ranking',10)->nullable();
            $table->string('library_reffered_by',100)->nullable();
            $table->timestamps();
        });



        /*Schema::create('library_salesarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('library_id')->unsigned();
            $table->string('salesarea_title',100);
            $table->string('salesarea_description',200);
            $table->timestamps();

            $table->foreign('library_id')
            ->references('id')
            ->on('libraries')
            ->onDelete('cascade');
        });
        Schema::create('library_salesadd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('library_id')->unsigned();
            $table->string('salesadd_title',100);
            $table->string('salesadd_description',200);
            $table->timestamps();

            $table->foreign('library_id')
            ->references('id')
            ->on('libraries')
            ->onDelete('cascade');
        });
*/
         DB::table('libraries')->insert(
            array(
                'library_title' => 'No Title',
                'library_description' => 'No Description',
                'library_address' => 'No Address',
                'library_district' => 'No District',
                'library_state' => 'No State',
                'library_payment_type' => 'Not Applicable',
                'library_owner' => 'No One',
                'library_contactno' => '00000000000',
                'library_email' => 'none@none.com',
                'library_est_date' => date("Y-m-d"),
                'library_cover' => 'noimage.jpg',
                'library_password'=> 'NADNADASMD(()(R(R)RIEIEEOEEOEOEIEUEUUEEE225e2e5e2e5e222cxcx5cx5c2xcx25cxc'
            )
        );



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
}
