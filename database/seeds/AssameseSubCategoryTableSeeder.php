<?php

use Illuminate\Database\Seeder;

class AssameseSubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assamese_sub_category')->insert([
        	['top_category_id' => '3', 'sub_category' => 'উত্তৰ পূৰ্বাঞ্চলৰ  বিষয়সমূহ', 'created_at' => now()],
        	['top_category_id' => '3', 'sub_category' => 'উত্তৰ পূৰ্বাঞ্চলৰ ৰাজ্য সমুহ', 'created_at' => now()],
        	['top_category_id' => '3', 'sub_category' => 'উত্তৰ পূৰ্বাঞ্চলৰ সংস্কৃতি', 'created_at' => now()],

        	['top_category_id' => '5', 'sub_category' => 'ৰাষ্ট্ৰীয়', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'বিজ্ঞান-প্ৰযুক্তি', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'বিশ্ব', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'ক্ৰীড়া', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'অৰ্থনীতি', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'ধৰ্ম', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'স্বাস্থ্য', 'created_at' => now()],
        	['top_category_id' => '5', 'sub_category' => 'প্ৰতিৰক্ষা', 'created_at' => now()],
        ]);
    }
}
