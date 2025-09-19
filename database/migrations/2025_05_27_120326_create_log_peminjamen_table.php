<?php

use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Buku::class)->constrained()->cascadeOnDelete();
            $table->date('rent_date');
            $table->date('return_date');
            $table->date('actual_return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_peminjamen');
    }
};
