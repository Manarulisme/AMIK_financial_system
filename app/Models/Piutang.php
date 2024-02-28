<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Piutang extends Model
{
    use HasFactory;

    protected $table = 'piutangs';
    protected $guarded = ['id'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }

}
