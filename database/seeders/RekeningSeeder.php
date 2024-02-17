<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rekening_banks')->insert([
            'kode_bank' => Str::random(10),
            'nama_bank' => 'BRI',
            'kcp' => 'Purwakarta',
            'nama_pemilik' => Str::random(15),
            'no_rek' => Str::random(10),
            'alamat' => Str::random(20)
        ]);

        DB::table('rekening_banks')->insert([
            'kode_bank' => Str::random(10),
            'nama_bank' => 'BCA',
            'kcp' => 'Purwakarta',
            'nama_pemilik' => Str::random(15),
            'no_rek' => Str::random(10),
            'alamat' => Str::random(20)
        ]);

        DB::table('rekening_banks')->insert([
            'kode_bank' => Str::random(10),
            'nama_bank' => 'BJB',
            'kcp' => 'Purwakarta',
            'nama_pemilik' => Str::random(15),
            'no_rek' => Str::random(10),
            'alamat' => Str::random(20)
        ]);

        DB::table('rekening_banks')->insert([
            'kode_bank' => Str::random(10),
            'nama_bank' => 'BCA',
            'kcp' => 'Purwakarta',
            'nama_pemilik' => Str::random(15),
            'no_rek' => Str::random(10),
            'alamat' => Str::random(20)
        ]);
    }
}
