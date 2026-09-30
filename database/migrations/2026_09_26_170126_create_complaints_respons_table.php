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

        Schema::create('complaint_responses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('complaint_id')
                ->constrained('complaints');

            $table->foreignId('counselor_id')
                ->constrained('users');

            $table->text('message');
            $table->enum('follow_up_status', ['pending', 'accepted', 'declined', 'completed'])->nullable();
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
        Schema::dropIfExists('complaint_responses');
    }
};
