<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['id' => 1, 'name' => 'vegetable', 'created_at' => now()]);
        DB::table('categories')->insert(['id' => 2, 'name' => 'fruit', 'created_at' => now()]);
        DB::table('categories')->insert(['id' => 3, 'name' => 'animal', 'created_at' => now()]);
    }
}
