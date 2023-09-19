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
        Schema::create('custom_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id'); // Foreign key

            $table->string('section_name');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('class_names');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_sections');
    }
};
