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

        Schema::create('counselor_contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users');

            $table->string('name', 255);
            $table->string('relationship', 100)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('rayon', 100)->nullable();
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
        Schema::dropIfExists('counselor_contacts');
    }
};
