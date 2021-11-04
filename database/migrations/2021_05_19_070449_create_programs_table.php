<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id')->nullable();
            $table->string('title')->nullable();
            $table->text('title_slug')->nullable();
            $table->string('banner')->nullable();
            $table->text('age_group')->nullable();
            $table->integer('batch');
            $table->integer('rate_per_session');
            $table->integer('fees');
            $table->text('about_course')->nullable();
            $table->text('why_joinus')->nullable();
            $table->text('gain_after')->nullable();
            $table->text('curriculum')->nullable();
            $table->text('batch_strength')->nullable();
            $table->text('class_per_week')->nullable();
            $table->text('about_mentor')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('student_document')->nullable();
            $table->text('teacher_observation')->nullable();
            $table->text('training_material')->nullable();
            $table->text('program_presentations')->nullable();
            $table->enum('status',['active','inactive']);
            $table->text('search_tag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
