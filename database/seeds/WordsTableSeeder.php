<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert(['category_id' => 1, 'word' => 'carrot', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'corn', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'eggplant', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'onion', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'pickle', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'potato', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 1, 'word' => 'tomato', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'apple', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'avocado', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'banana', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'blueberry', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'coconut', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'grapes', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 2, 'word' => 'lemon', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'mouse', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'octopus', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'rabbit', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'raccoon', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'sheep', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'snake', 'created_at' => now()]);
        DB::table('words')->insert(['category_id' => 3, 'word' => 'tiger', 'created_at' => now()]);
    }
}
