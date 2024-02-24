<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'subname'];

    public function pemasukan(): HasMany
    {
        return $this->hasMany(pemasukan::class);
    }

    public function pengeluaran(): HasMany
    {
        return $this->hasMany(pengeluaran::class);
    }
}
