<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Menu::count() == 7){
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 4,
                'title' => "Film Category",
                'icon' => 'fa-film',
                'uri' => 'film-categories',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 4,
                'title' => "Film Category",
                'icon' => 'fa-film',
                'uri' => 'film-categories',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 3,
                'title' => "Film",
                'icon' => 'fa-play',
                'uri' => 'films',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 2,
                'title' => "Episode",
                'icon' => 'fa-play-circle-o',
                'uri' => 'episodes',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 6,
                'title' => "Country",
                'icon' => 'fa-flag',
                'uri' => 'countries',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 7,
                'title' => "Ad",
                'icon' => 'fa-tv',
                'uri' => 'ads',
                'permission' => '*'
            ]);
            Menu::firstOrCreate([
                'parent_id' => 0,
                'order' => 5,
                'title' => "Type",
                'icon' => 'fa-file-movie-o',
                'uri' => 'types',
                'permission' => '*'
            ]);
        }
    }
}
