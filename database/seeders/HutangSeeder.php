<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <10 ; $i++) {
            DB::table('hutangs')->insert([
                'name' => Str::random(10),
                'kepada' => Str::random(10),
                'keterangan' => Str::random(20),
                'nominal' => random_int(1000,100000),
                'kategori_id' => '1'

            ]);
        }
    }
}
