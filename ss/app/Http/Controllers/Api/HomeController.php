<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\Film;
use App\Models\Episode;
use App\Models\Type;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getHomePage(){
        $data = [];
        $film_categories = FilmCategory::all();
        $data['categories'] = $film_categories;
        $data['5_newest_films'] = Film::orderBy('created_at', 'desc')->take(5)->get();
        $data['20_newest_films'] = Film::orderBy('created_at', 'desc')->take(20)->get();
        $types = Type::all();
        foreach ($film_categories as $key => $category){
            $data['20_newest_episodes'][$key]['category_id'] = $category->id;
            $data['20_newest_episodes'][$key]['category_name'] = $category->name;
            foreach ($types as $key1 => $type){
                $data['20_newest_episodes'][$key][$key1]['type_id'] = $type->id;
                $data['20_newest_episodes'][$key][$key1]['type_name'] = $type->name;
                $filmByType = Film::where('type_id', $type->id)->get();
                $ids = [];
                foreach ($filmByType as $film){
                    array_push($ids, $film->id);
                }
                $data['20_newest_episodes'][$key][$key1]['films'] = Episode::orderBy('created_at', 'desc')->whereIn('id', $ids)->get();
            }
        }
        return $data;
    }
}
