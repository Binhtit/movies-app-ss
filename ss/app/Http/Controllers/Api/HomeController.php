<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use App\Models\Film;
use App\Models\Episode;
use App\Models\Type;
use App\Models\Country;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getHomePage(){
        $data = [];
        $film_categories = FilmCategory::all();
        $countries = Country::all();
        $categories = FilmCategory::all();
        $types = Type::all();

        # Category
        $data['categories'] = FilmCategory::select('id', 'name')->orderBy('id', 'asc')->get();

        # Top 5 film
        $top5_newest_films = Film::orderBy('created_at', 'desc')
                                ->select('id', 'name', 'banner', 'star', 'episodes', 'release_date', 'description', 'author', 'type_id')
                                ->take(5)->get();
        foreach ($top5_newest_films as $key => $film){
            foreach ($types as $type){
                if($film->type_id == $type->id){
                    $top5_newest_films[$key]['type_name'] = $type->name;
                }
            }
        }
        $data['top_5_newest_films'] = $top5_newest_films;

        # top 40 newest eps
        $top40_newest_eps = Episode::orderBy('created_at', 'desc')
                                    ->select('id', 'name', 'film_id')
                                    ->take(40)->get();
        $allFilm = Film::all();
        foreach ($top40_newest_eps as $key => $ep){
            foreach ($allFilm as $film){
                if($film->id == $ep->film_id){
                    $top40_newest_eps[$key]['ep_name'] = $ep->name;
                    $top40_newest_eps[$key]['name'] = $film->name;
                    $top40_newest_eps[$key]['image'] = $film->image;
                    $top40_newest_eps[$key]['star'] = $film->star;
                    $top40_newest_eps[$key]['release_date'] = $film->release_date;
                    $top40_newest_eps[$key]['category_id'] = $film->category_id;
                    $top40_newest_eps[$key]['type_id'] = $film->type_id;
                }
            }
        }
        $data['top_40_newest_eps'] = $top40_newest_eps;
        return $data;
    }

    public function get20NewestFilm(){
        # Top 20 film
        $top20_newest_films = Film::orderBy('created_at', 'desc')->select('name', 'id', 'created_at')->take(20)->get();
        return $top20_newest_films;
    }
}
