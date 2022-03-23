<?php

use App\patient;
use App\patientVisit;
use App\users;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->string('systolic_B_P')->nullable();
            $table->string('diastolic_B_P')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bmi')->nullable();
            $table->string('respiratory')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('urine_output')->nullable();
            $table->string('blood_sugar_f')->nullable();
            $table->string('blood_sugar_r')->nullable();
            $table->string('spo_2')->nullable();
            $table->string('avpu')->nullable();
            $table->string('trauma')->nullable();
            $table->string('mobility')->nullable();
            $table->string('oxygen_supplementation')->nullable();
            $table->string('comment')->nullable();

            $table->foreignIdFor(patient::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(patientVisit::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(users::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
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
        Schema::dropIfExists('vitals');
    }
}
