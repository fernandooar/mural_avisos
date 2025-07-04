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
        Schema::create('tags_avisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aviso_id')->constrained();
            $table->foreignId('tag_id')->constrained();

            // $table->primary(['aviso_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_avisos');
    }
};
