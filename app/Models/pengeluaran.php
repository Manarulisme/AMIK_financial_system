<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengeluaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pengeluarans';

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }
}
