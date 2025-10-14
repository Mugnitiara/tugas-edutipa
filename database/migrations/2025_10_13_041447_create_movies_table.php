<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('judul');           
            $table->string('genre');             
            $table->decimal('rating', 3, 1)->default(0); 
            $table->timestamps();                
        });
    }

    /**
     * Kembalikan (rollback) migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
