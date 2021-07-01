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
            $table->string('author');
            $table->string('country');
            $table->string('category');
            $table->string('episodes');
            $table->string('description');
            $table->string('star');
            $table->string('date');
            $table->string('type');
            $table->string('image');
            $table->string('banner');
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by');
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
