<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_name');
            $table->integer('total_time');
            $table->integer('total_questions');
            $table->integer('right_mark');
            $table->integer('wrong_mark');
            $table->integer('pass_mark');
            $table->boolean('is_active')->default(false);
            $table->string('email')->unique();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_master');
    }
}
