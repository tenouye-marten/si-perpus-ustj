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
               Schema::create('skripsis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('prodi_id')
                ->constrained('prodis')
                ->cascadeOnDelete();

            $table->string('nama_penulis');

            $table->string('npm')
                ->unique();

            $table->string('judul');

            $table->string('slug')
                ->unique();

            $table->string('dosen_pembimbing');

            $table->string('cover')
                ->nullable();

            $table->year('tahun');

            $table->longText('abstrak')
                ->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
