<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_programs', function (Blueprint $table) {
            $table->id();
            $table->intger('program_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('teacher')->nullable();
            $table->string('student_name')->nullable();
            $table->string('child_name')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('age_group')->nullable();
            $table->string('program_type')->nullable();
            $table->string('program_price')->nullable();
            $table->string('student_batch')->nullable();
            $table->text('student_query')->nullable();
            $table->text('document')->nullable();
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
        Schema::dropIfExists('booked_programs');
    }
}
