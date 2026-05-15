<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * RUN MIGRATION
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {

            $table->id();

            /**
             * FOTO
             */
            $table->string('foto')
                ->nullable();

            /**
             * IDENTITAS
             */
            $table->string('nama');

         

            /**
             * JABATAN
             */
            $table->string('jabatan');

            /**
             * LEVEL STRUKTUR
             */
            $table->enum('level', [

                'kepala',
                'koordinator',
                'staff'

            ]);

            /**
             * BIDANG / DIVISI
             */
            $table->string('bidang')
                ->nullable();

            /**
             * URUTAN TAMPIL
             */
            $table->integer('urutan')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * ROLLBACK
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};