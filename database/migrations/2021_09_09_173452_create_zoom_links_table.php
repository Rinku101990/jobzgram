<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoomLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom_links', function (Blueprint $table) {
            $table->zoom_id();
            $table->integer('zoom_pgrm_id');
            $table->string('zoom_ref_id')->nullable();
            $table->string('zoom_host_email')->nullable();
            $table->string('zoom_topic')->nullable();
            $table->string('zoom_agenda')->nullable();
            $table->string('zoom_join_url')->nullable();
            $table->string('zoom_join_password')->nullable();
            $table->string('zoom_start_time')->nullable();
            $table->string('zoom_status')->nullable();
            $table->string('zoom_timezone')->nullable();
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
        Schema::dropIfExists('zoom_links');
    }
}
