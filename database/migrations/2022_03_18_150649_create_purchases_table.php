<?php

use App\Models\MedicineType;
use App\Models\MedicineCategory;
use App\Models\Supplier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->tinyInteger('type');

            //Medicine
            $table->string('medicine_generic_name')->nullable();
            $table->string('medicine_unit')->nullable();
            $table->string('medicine_strength')->nullable();
            $table->string('medicine_shelf')->nullable();

            //medicince price and quantity
            $table->unsignedBigInteger('quantity')->default();
            $table->string('quantity_type')->nullable();
            $table->integer('price')->nullable();
            $table->datte('expiration_date')->nullable();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->foreignIdFor(MedicineType::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            $table->foreignIdFor(MedicineCategory::class)-> nullable()->constrained()->comment('The user_id is the Doctor_id in this table');
            $table->foreignIdFor(Supplier::class)-> nullable()->constrained()->onDelete('casecade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('purchases');
    }
}
