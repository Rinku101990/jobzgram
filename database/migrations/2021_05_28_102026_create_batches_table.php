<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('teacher_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule')->nullable();
            $table->string('duration')->nullable();
            $table->string('img')->nullable();
            $table->string('video')->nullable();
            $table->string('document')->nullable();
            $table->string('batch_link')->nullable();            
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('batches');
    }
}
