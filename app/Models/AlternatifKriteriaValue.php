<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifKriteriaValue extends Model
{
    use HasFactory;

    protected $table = 'alternatif_kriteria_value'; // Nama tabel dalam database

    protected $fillable = [
        'kriteria_id',
        'alternatif_id',
        'value',
    ];

    // Jika Anda memiliki relasi dengan model lain, Anda dapat menentukannya di sini
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
}
