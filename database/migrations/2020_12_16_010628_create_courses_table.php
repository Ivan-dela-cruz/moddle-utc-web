<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_level_subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('career')->nullable();
            $table->string('url_image')->nullable();
            $table->longText('content')->nullable();
            
            $table->boolean('status')->nullable()->default(true);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('period_level_subject_id')->references('id')->on('period_level_subject');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
