<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->restrictOnUpdate()->cascadeOnDelete();
            $table->boolean('is_private')->default(false);
            $table->uuid()->unique();
            $table->string('state', 190)->index();
            $table->string('name', 190)->index();
            $table->string('slug', 190)->index();
            $table->text('description')->nullable();
            $table->timestamp('checkmark_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('todos');
        Schema::enableForeignKeyConstraints();
    }
};
