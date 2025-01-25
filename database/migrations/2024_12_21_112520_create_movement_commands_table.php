<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movement_commands', function (Blueprint $table) {
            $table->id();
            $table->string('organized_by');
            $table->integer('status')->default(1);
            $table->string('number');
            $table->date('date');
            $table->string('responsible');
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('truck_id')->constrained();
            $table->string('destination');
            $table->string('task');
            $table->integer('initial_odometer_number')->nullable();
            $table->integer('final_odometer_number')->nullable();
            $table->integer('distance')->nullable();
            $table->time('command_time');
            $table->time('task_start_time');
            $table->time('task_end_time')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movement_commands');
    }
};
