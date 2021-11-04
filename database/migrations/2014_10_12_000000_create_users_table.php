<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            #common Fields
            $table->string('prefixName')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('whatsAppNo')->nullable()->comment('For Crew');
            $table->string('profileImage')->nullable();
            
            $table->date('dob')->nullable();
            $table->string('hobbies')->nullable();
            $table->integer('consultation_fee');
            $table->string('specialization')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('about_your_self')->nullable();
            $table->string('award_achievements')->nullable();
            $table->string('license')->nullable();
            $table->string('session_taken')->nullable();
            $table->enum('gender',['1','2','3'])->comment('1:Male,2:Female,3:Other');
            $table->string('timezone')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('house_no')->nullable();
            $table->string('colony')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('bankName')->nullable();
            $table->string('accountHolderName')->nullable();
            $table->string('accountNumber')->nullable();
            $table->string('ifscCode')->nullable();
            $table->text('bankAddress')->nullable();
            
            $table->string('mobileOtp')->nullable();
            $table->string('emailOtp')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('deviceToken')->nullable();
            $table->enum('deviceType',['1','2'])->comment('1:Android,2:IOS')->default('1');
            
            
            $table->enum('registerAs',['teacher','student','doctor','patient','child_counsellor','admin'])->default('student');
            $table->enum('isMobileVerify',['true','false'])->default('false');
            $table->enum('isEmailVerify',['true','false'])->default('false');
            $table->text('search_tag')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
