<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('film_id');
            $table->string('link_1', 1500);
            $table->string('link_2', 1500)->nullable();
            $table->string('link_3', 1500)->nullable();
            $table->string('link_4', 1500)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('description', 1500)->nullable();
            $table->integer('status')->default(1);
            $table->integer('position')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('episodes');
    }
}
