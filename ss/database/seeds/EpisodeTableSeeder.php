<?php

use Illuminate\Database\Seeder;
use App\Models\Episode;

class EpisodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Episode::count() == 0){
            Episode::firstOrCreate([
                'name' => "Tập 1",
                'link_1' => "https://www.youtube.com/watch?v=V3VSqlomOCI",
                'film_id' => "1",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            Episode::firstOrCreate([
                'name' => "Tập 2",
                'link_1' => "https://www.youtube.com/watch?v=iICDVqXkhWk",
                'film_id' => "1",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            Episode::firstOrCreate([
                'name' => "Tập 1",
                'link_1' => "https://www.youtube.com/watch?v=V3VSqlomOCI",
                'film_id' => "2",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            Episode::firstOrCreate([
                'name' => "Tập 2",
                'link_1' => "https://www.youtube.com/watch?v=iICDVqXkhWk",
                'film_id' => "2",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
        }
    }
}
