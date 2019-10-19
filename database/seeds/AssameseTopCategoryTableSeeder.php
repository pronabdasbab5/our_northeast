<?php

use Illuminate\Database\Seeder;

class AssameseTopCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assamese_top_category')->insert([
        	['top_category' => 'ইতিবাচক খবৰ', 'created_at' => now()],
        	['top_category' => 'বাওঁ-কেন্দ্ৰ-সোঁ', 'created_at' => now()],
        	['top_category' => 'উত্তৰ পূৰ্বাঞ্চলৰ কেন্দ্ৰবিন্দু', 'created_at' => now()],
        	['top_category' => 'পরিবর্তন', 'created_at' => now()],
        	['top_category' => 'অন্বেষণ', 'created_at' => now()],
        ]);
    }
}
