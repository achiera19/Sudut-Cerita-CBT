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
        Schema::disableForeignKeyConstraints();

        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('complaint_id')
                ->constrained('complaints');

            $table->foreignId('counselor_id')
                ->constrained('users');

            $table->string('action', 255);
            $table->text('notes')->nullable();
            $table->boolean('contacted_rayon')->nullable();
            $table->dateTime('follow_up_date')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
