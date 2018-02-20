<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('originator_id')->unsigned();
            $table->integer('assignee_id')->unsigned();

            //$table->integer('status_id')->unsigned();

            $table->integer('source_id')->unsigned();
            $table->integer('classification_id')->unsigned();

            $table->string('document_no')->nullable();
            $table->text('description');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
