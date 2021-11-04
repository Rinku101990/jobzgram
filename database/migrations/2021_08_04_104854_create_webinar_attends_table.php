<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar_attends', function (Blueprint $table) {
            $table->id();
            $table->integer('webinar'); 
            $table->string('name')->nullable();   
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->date('webinar_date'); 
            $table->string('payment')->nullable(); 
            $table->text('currency')->nullable(); 
            $table->string('txt_id')->nullable(); 
            $table->string('txt_status')->nullable(); 
            $table->string('speaker')->nullable(); 
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
        Schema::dropIfExists('webinar_attends');
    }
}
