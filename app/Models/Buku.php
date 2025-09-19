<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kategori_id', 'cover', 'judul', 'penulis', 'deskripsi', 'penerbit', 'thn_terbit', 'status'];

    public function kategori() : BelongsTo {
        return $this->belongsTo(Kategori::class);
    }

    public function logPeminjaman(): HasMany
    {
        return $this->hasMany(LogPeminjaman::class);
    }

    public function getRouteKeyName()
    {
        return 'judul';
    }
}
