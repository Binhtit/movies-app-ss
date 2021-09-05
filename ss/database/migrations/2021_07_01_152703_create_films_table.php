<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('author')->nullable();
            $table->string('cast')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('category_id');
            $table->string('total_episodes')->nullable();
            $table->integer('newest_episode')->nullable();
            $table->string('description', 1500);
            $table->integer('star')->nullable();
            $table->datetime('release_date')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('film_status')->nullable();
            $table->string('resolution')->nullable();
            $table->string('language')->nullable();
            $table->string('imdb')->nullable();
            $table->string('running_time')->nullable();
            $table->string('time_slot')->nullable();
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
        Schema::dropIfExists('films');
    }
}