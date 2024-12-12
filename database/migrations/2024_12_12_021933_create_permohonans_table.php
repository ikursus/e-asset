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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemohon_id')->constrained('users')->onDelete('cascade');
            $table->string('tujuan')->nullable();
            $table->string('tempat_digunakan')->nullable();
            $table->date('tarikh_permohonan')->nullable();
            $table->date('tarikh_diluluskan')->nullable();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_dikembalikan')->nullable();
            $table->text('nota')->nullable();
            $table->string('status', 30)->default('pending');
            $table->foreignId('pelulus_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
