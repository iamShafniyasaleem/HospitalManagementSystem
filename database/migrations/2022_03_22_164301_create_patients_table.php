<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('referral')->nullable()->comment('1= Yes, 0= No');
            $table->string('referred_by')->nullable();
            $table->integer('patient_type')->nullable()->comment('1=InPatient, 0= OutPatient');
            $table->string('title')->nullable()->comment('Mr. Miss. Mrs. etc.');
            $table->string('name')->nullable()->comment('Full name of patient');
            $table->date('dob')->comment('numbers only');
            $table->integer('age')->nullable()->comment('numbers only');
            $table->string('gender')->nullable()->comment('M = male, F = female');
            $table->string('marital_status')->nullable()->comment('S = single, D = divorce , M = married');
            $table->string('Blood_group')->nullable();
            $table->string('email')->nullable()->comment('One email can be use for multiple user');
            $table->integer('phone')->nullable()->comment('one number can be used for multiple user');
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable()->comment('student, farmer etc');
            $table->string('country')->nullable();
            $table->integer('patient_type')->nullable()->comment('1=InPatient, 0= OutPatient');

            $table->string('home_phone')->nullable();
            $table->string('home_address')->nullable();
            $table->string('father_name')->nullable();
            $table->text('father_address')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('mother_address')->nullable();
            $table->string('mother_phone')->nullable();

            //next of kin
            $table->tinyInteger('same_a_patient')->default(0)->comment('if same as patient all address will copy');
            $table->string('next_of_kin_phone')->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->text('next_of_kin_address')->nullable();

            //payment method
            $table->string('payment_method')->default(1)->comment('1 = Cash');

            $table->text('symptomps')->nullable();
            $table->string('image')->nullable();
            
            
            

            
            $table->foreignIdFor(User::class)-> nullable()->constrained()->comment('The user_id is the Doctor_id in this table');
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('casecade')->onUpdate('cascade');
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('casecade')->onUpdate('cascade');
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
        Schema::dropIfExists('patients');
    }
}
