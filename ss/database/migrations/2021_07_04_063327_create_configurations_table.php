<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('domain');
            $table->integer('domain_template_id')->default(1);
            $table->string('site_name')->nullable();
            $table->string('site_description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('header')->nullable();
            $table->string('footer')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
