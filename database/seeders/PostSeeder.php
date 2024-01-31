<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <10 ; $i++) {
            Post::create([
                'title' => Str::random(10),
                'news_content' => Str::random(10),
                'user_id' => '1'

            ]);
        }
            // DB::table('posts')->insert([

            // ]);


    }
}
