<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnglishTopCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('english_top_category')->insert([
        	['top_category' => 'POSITIVE NEWS', 'created_at' => now()],
        	['top_category' => 'LEFT-CENTER-RIGHT', 'created_at' => now()],
        	['top_category' => 'NE-FOCUS', 'status' => 1, 'created_at' => now()],
        	['top_category' => 'TRANSFORM', 'created_at' => now()],
        	['top_category' => 'EXPLORE', 'status' => 1, 'created_at' => now()],
        ]);
    }
}
