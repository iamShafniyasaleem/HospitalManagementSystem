<?php

use App\medicines;
use App\Models\Patient;
use App\patientVisit;
use App\User;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->string('food_relation')->nullable();
            $table->string('route')->nullable();
            $table->string('instruction')->nullable();
            
            $table->tinyInteger('status')->default(0);
            $table->foreignIdFor(Patient::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(patientVisit::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(User::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(medicines::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
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
        Schema::dropIfExists('prescriptions');
    }
}
