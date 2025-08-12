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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ambiente_id')->contrained('ambientes')-> onDelete('cascade');
            $table->string('codigo')->unique();
            $table->string('tipo')->nullable(false);
            $table->text('descricao')->nullable();
            $table->boolean('status')->default(true); // so pode ter um resultado facil e verdadeiro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
