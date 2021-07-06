<?php

use Illuminate\Database\Seeder;
use App\Models\FilmCategory;

class FilmCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(FilmCategory::count() == 0){
            FilmCategory::firstOrCreate([
                'name' => "Phim 2D",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            FilmCategory::firstOrCreate([
                'name' => "Phim 3D",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
        }
    }
}
