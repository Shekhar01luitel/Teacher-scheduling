<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('time_slot_id');
            $table->unsignedBigInteger('day_id');
            $table->string('class_room')->nullable(); // If applicable
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users'->where role = 'teacher');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('time_slot_id')->references('id')->on('time_slots');
            $table->foreign('day_id')->references('id')->on('days_of_week');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_entries');
    }
};
