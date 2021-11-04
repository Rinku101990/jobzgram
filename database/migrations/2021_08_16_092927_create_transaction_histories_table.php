<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('booked_program_id')->nullable();
            $table->integer('program_id')->nullable();
            $table->integer('student');
            $table->integer('counselor_teacher');
            $table->integer('transaction');
            $table->text('transaction_type')->nullable();
            $table->text('currency')->nullable();
            $table->string('type');
            $table->text('txt_id')->nullable();
            $table->string('entity')->nullable();
            $table->enum('payment_status',['Paid','Unpaid']);
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
        Schema::dropIfExists('transaction_histories');
    }
}
