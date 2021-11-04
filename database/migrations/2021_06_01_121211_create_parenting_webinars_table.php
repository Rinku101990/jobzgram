<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentingWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parenting_webinars', function (Blueprint $table) {
            $table->id();
            $table->string('speaker')->nullable();
            $table->string('category')->nullable();
            $table->string('title')->nullable(); 
            $table->text('title_slug')->nullable();            
            $table->string('img')->nullable(); 
            $table->text('description')->nullable();
            $table->text('search_tag')->nullable();  
            $table->date('expire_date')->nullable();                                    
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
        Schema::dropIfExists('parenting_webinars');
    }
}
