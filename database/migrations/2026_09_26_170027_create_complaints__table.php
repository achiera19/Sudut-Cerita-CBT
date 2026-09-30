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

        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users');

            $table->string('title', 255);
            $table->text('description');
            $table->string('category', 100)->nullable();
            $table->enum('status', ['pending', 'reviewed', 'followed_up', 'rejected', 'resolved'])->nullable();
            $table->enum('priority', ['normal', 'urgent', 'dangerous'])->nullable();
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
        Schema::dropIfExists('complaints');
    }
};
