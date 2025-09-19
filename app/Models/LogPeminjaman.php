<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'logpinjamans';
    protected $primaryKey = 'id';
    protected $fillable = ['id','siswa_id', 'buku_id', 'rent_date', 'return_date', 'actual_return_date'];

        public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

        public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
}
