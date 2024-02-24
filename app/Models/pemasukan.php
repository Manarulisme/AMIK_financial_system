<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukans';
    protected $guarded = ['id'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }
}
