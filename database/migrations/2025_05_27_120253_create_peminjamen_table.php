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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id('id');
            $table->foreignIdFor(Siswa::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Buku::class)->constrained()->cascadeOnDelete();
            $table->date('tgl_pinjam');
            $table->date('tgl_jatuh_tempo');
            $table->enum('status', ['dipinjam', 'kembali']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
