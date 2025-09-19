<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table ='siswas';
    protected $primaryKey ='id';
    protected $fillable =['id', 'nisn', 'name', 'jenkel', 'alamat', 'no_tlp'];

        public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class,);
    }

    public function pengembalian(): HasMany
    {
        return $this->hasMany(Pengembalian::class);
    }

}
