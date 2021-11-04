<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user')->nullable();   
            $table->string('category')->nullable();
            $table->string('title')->nullable(); 
            $table->text('title_slug')->nullable();            
            $table->string('author')->nullable();
            $table->string('img')->nullable(); 
            $table->text('description')->nullable();
            $table->text('search_tag')->nullable();                        
            $table->enum('status',['active','inactive','reject']);
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
        Schema::dropIfExists('blogs');
    }
}
