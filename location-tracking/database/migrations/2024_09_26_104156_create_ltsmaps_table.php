<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ltsmaps', function (Blueprint $table) {
            $table->id();
            $table->string('street_locality')->nullable();
            $table->string('city_town_village')->nullable();
            $table->string('district')->nullable();
            $table->string('region_state_province')->nullable();
            $table->string('zip_code_postcode')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ltsmaps');
    }
};
