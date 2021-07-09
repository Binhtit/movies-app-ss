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
        $data['categories'] = $film_categories;

        # Top 5 film
        $top5_newest_films = Film::orderBy('created_at', 'desc')->take(5)->get();
        foreach ($top5_newest_films as $film){
            foreach ($countries as $country){
                if($film->country == $country->id){
                    $film->country = $country->name;
                }
            }
            foreach ($categories as $category){
                if($film->category_id == $category->id){
                    $film->category_id = [$category->id, $category->name];
                }
            }
            foreach ($types as $type){
                if($film->type_id == $type->id){
                    $film->type_id = [$type->id, $type->name];
                }
            }
        }
        $data['5_newest_films'] = $top5_newest_films;

        # Top 20 film
        $top20_newest_films = Film::orderBy('created_at', 'desc')->take(20)->get();
        $data['20_newest_films'] = $top20_newest_films;
        foreach ($top20_newest_films as $film){
            foreach ($countries as $country){
                if($film->country == $country->id){
                    $film->country = $country->name;
                }
            }
            foreach ($categories as $category){
                if($film->category_id == $category->id){
                    $film->category_id = [$category->id, $category->name];
                }
            }
            foreach ($types as $type){
                if($film->type_id == $type->id){
                    $film->type_id = [$type->id, $type->name];
                }
            }
        }

        # top 20 ep
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
                $data['20_newest_episodes'][$key][$key1]['episodes'] = Episode::orderBy('created_at', 'desc')->whereIn('id', $ids)->get();
            }
        }
        return $data;
    }
}
