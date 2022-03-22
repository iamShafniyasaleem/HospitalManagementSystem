<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientVisistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_visists', function (Blueprint $table) {
            $table->id();
            $table->string('visit_no')->nullable();
            $table->string('visit_type')->nullable();
            $table->date('visit_date')->nullable();
            $table->tinyInteger('visit_status')->default(0)->comment('when complete the status will change');
            $table->text('description')->nullable();
            $table->foreignIdFor(Patient::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
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
        Schema::dropIfExists('patient_visists');
    }
}
