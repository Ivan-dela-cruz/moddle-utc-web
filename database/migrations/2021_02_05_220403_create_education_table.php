<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_period_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('career')->nullable();
            $table->string('url_image')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('academic_period_id')->references('id')->on('academic_periods');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
