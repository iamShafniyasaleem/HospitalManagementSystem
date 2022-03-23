<?php

use App\patient;
use App\patientVisit;
use App\User;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmunizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immunizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignIdFor(patient::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(patientVisit::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(User::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
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
        Schema::dropIfExists('immunizations');
    }
}
