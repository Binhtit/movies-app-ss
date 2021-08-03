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
        $eps = Episode::all();
        $position = [];
        foreach($eps as $ep){
            if(!$ep->position){
                $name = $ep->name;
                if(str_contains($name, '-')){
                    $position = explode('-', $name);
                }
                else{
                    $position = explode('Tập ', $name);
                }
                if(isset($position[1])){
                    Episode::where('id', $ep->id)->update(['position' => (int)$position[1]]);
                }
            }
        }
    }
}
