<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table ='peminjamen';
    protected $primaryKey ='id';
    protected $fillable =['id', 'siswa_id', 'buku_id', 'tgl_pinjam', 'tgl_jatuh_tempo', 'status'];


    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }


    public function pengembalian(): HasOne
    {
        return $this->hasOne(Pengembalian::class, 'pengembalian_id');
    }
}
