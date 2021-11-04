<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_attends', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id'); 
            $table->string('name')->nullable();   
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('payment')->nullable(); 
            $table->text('currency')->nullable(); 
            $table->string('txt_id')->nullable(); 
            $table->string('txt_status')->nullable(); 
            $table->text('description')->nullable();              
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
        Schema::dropIfExists('course_attends');
    }
}
