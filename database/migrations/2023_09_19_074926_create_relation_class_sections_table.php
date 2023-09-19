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
        Schema::create('relation_class_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id'); // Foreign key form class_names table bata
            $table->unsignedBigInteger('section_id');  // Foreign key form sections table bata
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('class_names');
            $table->foreign('section_id')->references('id')->on('sections');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_class_sections');
    }
};
