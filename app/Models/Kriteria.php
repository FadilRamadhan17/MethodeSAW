<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria',
        'bobot',
    ];

    public function alternatif()
    {
        return $this->belongsToMany(Alternatif::class)->withPivot('value'); // Jika Anda ingin mengambil nilai dari tabel pivot
    }
}
