<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_files', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('file_id');
            //$table->unsignedBigInteger('task_id');
            $table->boolean('status')->nullable()->default(true);
            $table->softDeletes();
            $table->timestamps();
           // $table->foreign('file_id')->references('id')->on('files');
            //$table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_files');
    }
}
