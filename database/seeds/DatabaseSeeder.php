<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EnglishTopCategoryTableSeeder::class);
        $this->call(AssameseTopCategoryTableSeeder::class);
        $this->call(EnglishSubCategoryTableSeeder::class);
        $this->call(AssameseSubCategoryTableSeeder::class);
    }
}
