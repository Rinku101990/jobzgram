<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentingQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parenting_queries', function (Blueprint $table) {
            $table->id();
            $table->integer('p_id')->nullable();   
            $table->integer('student');   
            $table->integer('category')->nullable();            
            $table->text('query')->nullable();   
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('parenting_queries');
    }
}
