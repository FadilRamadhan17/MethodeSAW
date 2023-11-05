<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'data'
    ];

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class)->withPivot('value'); // Jika Anda ingin mengambil nilai dari tabel pivot
    }
}
