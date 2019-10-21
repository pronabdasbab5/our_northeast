<?php

use Illuminate\Database\Seeder;

class EnglishSubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('english_sub_category')->insert([
        	['top_category_id' => '3', 'sub_category' => 'NE Issue', 'created_at' => now()],
        	['top_category_id' => '3', 'sub_category' => 'NE States', 'created_at' => now()],
        	['top_category_id' => '3', 'sub_category' => 'NE Culture', 'created_at' => now()],

        	['top_category_id' => '5', 'sub_category' => 'National', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Science & Teconology', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'World', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Sports', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Economics', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Religion', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Health', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'Defense', 'created_at' => now()],
        ]);
    }
}
