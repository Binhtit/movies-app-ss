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
        $this->call(FilmCategoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(FilmTableSeeder::class);
        $this->call(EpisodeTableSeeder::class);
    }
}
